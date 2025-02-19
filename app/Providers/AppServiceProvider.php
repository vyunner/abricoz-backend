<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LogViewer::auth(function ($request) {
            $user = auth('web')->user();
            $phones = [
                '+77026207447',
                '+77022363206',
            ];

            return isset($user) && in_array($user->phone, $phones);
        });
    }
}
