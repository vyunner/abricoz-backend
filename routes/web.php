<?php

use App\Http\Controllers\WebAdmin;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Http\Request;
use App\Telegram\Commands\DailyOrdersCommand;
use App\Telegram\Commands\OrderByIdCommand; // 👈 добавь импорт

Route::view('/UHoxHPD8bV1sCc1uIj8lWUmO', 'otp-verification')->name('welcome');
Route::post('/send-otp', WebAdmin\SendCodeController::class)->middleware(['throttle:1,1'])->name('send.otp');
Route::post('/verify-otp', WebAdmin\LoginController::class)->name('verify.otp');

Route::get('/dashboard', function () {
    return "You are logged in!";
})->middleware('auth')->name('dashboard');

Route::post('/telegram/webhook', function (Request $request) {
    $update = Telegram::getWebhookUpdate();

    // Обработка force reply для /orders
    if (
        $update->isType('message') &&
        $update->getMessage()->getReplyToMessage() &&
        str_contains($update->getMessage()->getReplyToMessage()->getText(), 'Введите число текущего месяца')
    ) {
        (new DailyOrdersCommand())->processMessage($update);
        return response()->json(['status' => 'orders processed']);
    }

    // Обработка force reply для /order
    if (
        $update->isType('message') &&
        $update->getMessage()->getReplyToMessage() &&
        str_contains($update->getMessage()->getReplyToMessage()->getText(), 'Введите ID заказа')
    ) {
        (new OrderByIdCommand())->processMessage($update);
        return response()->json(['status' => 'order processed']);
    }

    // Все остальные команды
    Telegram::commandsHandler(true);
    return response()->json(['status' => 'ok']);
});
