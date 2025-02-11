<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class FirebaseNotificationService
{
    private function getServiceAccountCredentials($app)
    {
        $path = config("firebase.credentials.$app");

        if (!file_exists($path)) {
            throw new \Exception("Firebase credentials file not found at: $path");
        }

        $jsonKey = json_decode(file_get_contents($path), true);

        if (!$jsonKey) {
            throw new \Exception("Invalid Firebase credentials file.");
        }

        return $jsonKey;
    }

    private function createJwt($credentials)
    {
        $now = time();
        $exp = $now + 3600;

        $payload = [
            'iss' => $credentials['client_email'],
            'sub' => $credentials['client_email'],
            'aud' => $credentials['token_uri'],
            'iat' => $now,
            'exp' => $exp,
            'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
        ];

        $jwtHeader = [
            'alg' => 'RS256',
            'typ' => 'JWT',
        ];

        $segments = [];
        $segments[] = $this->urlsafeB64Encode(json_encode($jwtHeader));
        $segments[] = $this->urlsafeB64Encode(json_encode($payload));
        $signingInput = implode('.', $segments);

        $signature = '';
        openssl_sign($signingInput, $signature, $credentials['private_key'], OPENSSL_ALGO_SHA256);

        $segments[] = $this->urlsafeB64Encode($signature);

        return implode('.', $segments);
    }

    private function urlsafeB64Encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function getAccessToken($credentials)
    {
        $cacheKey = 'firebase_access_token_' . md5($credentials['client_email']);

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $jwt = $this->createJwt($credentials);

        $postFields = http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $credentials['token_uri']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        if ($result === false) {
            throw new \Exception('Failed to get access token: ' . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new \Exception("Failed to get access token: HTTP $httpCode - $result");
        }

        $response = json_decode($result, true);

        if (!isset($response['access_token'])) {
            throw new \Exception('Access token not found in response.');
        }

        $accessToken = $response['access_token'];

        Cache::put($cacheKey, $accessToken, now()->addMinutes(55));

        return $accessToken;
    }

    private function makeCurlRequest($url, $headers, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

        $result = curl_exec($ch);

        if ($result === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception('Failed to send notification: ' . $error);
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'http_code' => $httpCode,
            'result' => $result,
        ];
    }

    public function sendNotification($app, $deviceToken, $messageData)
    {
        $credentials = $this->getServiceAccountCredentials($app);

        Log::debug('Firebase credentials loaded:', $credentials);

        $accessToken = $this->getAccessToken($credentials);

        $url = 'https://fcm.googleapis.com/v1/projects/' . $credentials['project_id'] . '/messages:send';

        $headers = [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json; UTF-8',
        ];

        $postData = [
            'message' => [
                'token' => $deviceToken,
                'notification' => [
                    'title' => $messageData['title'],
                    'body' => $messageData['body'],
                ],
                'data' => $messageData['data'] ?? [],
            ],
        ];

        $maxRetries = 3;
        $retryCount = 0;
        $retryDelay = 1;

        do {
            $response = $this->makeCurlRequest($url, $headers, $postData);

            Log::info('FCM request attempt', [
                'attempt'   => $retryCount + 1,
                'http_code' => $response['http_code'],
                'response'  => $response['result'],
            ]);

            if ($response['http_code'] === 200) {
                return json_decode($response['result'], true);
            } elseif (in_array($response['http_code'], [500, 502, 503, 504])) {
                sleep($retryDelay);
                $retryDelay *= 2;
                $retryCount++;
            } elseif ($response['http_code'] === 401 || $response['http_code'] === 403) {
                $cacheKey = 'firebase_access_token_' . md5($credentials['client_email']);
                Cache::forget($cacheKey);
                $accessToken = $this->getAccessToken($credentials);
                $headers['Authorization'] = 'Bearer ' . $accessToken;
                $retryCount++;
            } else {
                $responseData = json_decode($response['result'], true);
                $errorMessage = $responseData['error']['message'] ?? 'Unknown error';

                Log::error('Failed to send notification', [
                    'http_code' => $response['http_code'],
                    'response' => $response['result'],
                    'attempt' => $retryCount + 1,
                ]);

                throw new \Exception("Failed to send notification: {$errorMessage}");
            }
        } while ($retryCount < $maxRetries);

        throw new \Exception('Failed to send notification after multiple attempts.');
    }
}
