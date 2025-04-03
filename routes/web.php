<?php

use App\Http\Controllers\WebAdmin;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Http\Request;
use App\Telegram\Commands\DailyOrdersCommand;

Route::view('/UHoxHPD8bV1sCc1uIj8lWUmO', 'otp-verification')->name('welcome');
Route::post('/send-otp', WebAdmin\SendCodeController::class)->middleware(['throttle:1,1'])->name('send.otp');
Route::post('/verify-otp', WebAdmin\LoginController::class)->name('verify.otp');

Route::get('/dashboard', function () {
    return "You are logged in!";
})->middleware('auth')->name('dashboard');


Route::post('/telegram/webhook', function (Request $request) {
    $update = Telegram::getWebhookUpdate();

    // Обработка force reply — если это ответ на "Введите число текущего месяца"
    if (
        $update->isType('message') &&
        $update->getMessage()->getReplyToMessage() &&
        str_contains($update->getMessage()->getReplyToMessage()->getText(), 'Введите число текущего месяца')
    ) {
        (new DailyOrdersCommand())->processMessage($update);
        return response()->json(['status' => 'processed']);
    }

    // Стандартная обработка /start, /orders и т.д.
    Telegram::commandsHandler(true);

    return response()->json(['status' => 'ok']);
});
