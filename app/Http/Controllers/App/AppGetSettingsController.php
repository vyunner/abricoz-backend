<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

/**
 * @group App
 */
class AppGetSettingsController extends Controller
{
    /**
     * Status
     * @param Request $request
     * @return int[]
     */
    public function __invoke(Request $request)
    {
        return [
            'isAppActive' => 1,            // Приложение активно
            'minOrderAmount' => 5000,         // Минимальная сумма заказа
            'isCashPaymentActive' => 0   // Разрешена ли оплата наличными
        ];
    }
}
