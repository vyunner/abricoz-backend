<?php

namespace App\Services;

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
        $exp = $now + 3600; // Токен действителен 1 час

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
        openssl_sign($signingInput, $signature, $credentials['private_key'], 'SHA256');

        $segments[] = $this->urlsafeB64Encode($signature);

        return implode('.', $segments);
    }

    private function urlsafeB64Encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function getAccessToken($jwt, $credentials)
    {
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
        if ($httpCode !== 200) {
            throw new \Exception("Failed to get access token: HTTP $httpCode - $result");
        }

        curl_close($ch);

        $response = json_decode($result, true);

        if (!isset($response['access_token'])) {
            throw new \Exception('Access token not found in response.');
        }

        return $response['access_token'];
    }

    public function sendNotification($app, $deviceToken, $messageData)
    {
        $credentials = $this->getServiceAccountCredentials($app);
        $jwt = $this->createJwt($credentials);
        $accessToken = $this->getAccessToken($jwt, $credentials);

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

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Отключить проверку SSL сертификата для тестирования
        curl_setopt($ch, CURLOPT_VERBOSE, true); // Включить подробный вывод

        $verboseLog = fopen('php://temp', 'w+');
        curl_setopt($ch, CURLOPT_STDERR, $verboseLog);

        $result = curl_exec($ch);

        // Записываем подробный лог
        rewind($verboseLog);
        $verboseOutput = stream_get_contents($verboseLog);
        \Log::info('cURL verbose output: ' . $verboseOutput);

        if ($result === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception('Failed to send notification: ' . $error);
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        \Log::info('FCM Response', [
            'http_code' => $httpCode,
            'response' => $result,
        ]);

        if ($httpCode !== 200) {
            throw new \Exception("Failed to send notification: HTTP $httpCode - $result");
        }

        return json_decode($result, true);
    }
}
