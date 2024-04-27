<?php

namespace App\Providers;

use App\Interfaces\MobizonServiceInterface;
use App\Services\MobizonService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public array $bindings = [
        MobizonServiceInterface::class => MobizonService::class
    ];
}
