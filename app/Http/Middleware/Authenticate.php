<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{
    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request)
        );
    }

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return null; // Возвращаем null, чтобы не было перенаправления
        }
    }
}
