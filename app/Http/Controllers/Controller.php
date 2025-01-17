<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response(mixed $data, string $message, int $code = 200): JsonResponse
    {
        $response = [
            'data' => ($code == Response::HTTP_OK) ? $data : null,
            'message' => $message,
            'http_code' => $code,
            'status' => ($code === Response::HTTP_OK) ? 'success' : 'failed',
        ];

        return response()->json($response, $code);
    }
}
