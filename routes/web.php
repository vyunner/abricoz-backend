<?php

use App\Http\Controllers\WebAdmin;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Http\Request;

Route::view('/UHoxHPD8bV1sCc1uIj8lWUmO', 'otp-verification')->name('welcome');
Route::post('/send-otp', WebAdmin\SendCodeController::class)->middleware(['throttle:1,1'])->name('send.otp');
Route::post('/verify-otp', WebAdmin\LoginController::class)->name('verify.otp');

Route::get('/dashboard', function () {
    return "You are logged in!";
})->middleware('auth')->name('dashboard');

Route::post('/telegram/webhook', function (Request $request) {
    $update = Telegram::getWebhookUpdate();

    // Обработка force reply для команды /orders
    if ($update->isType('message') && $update->getMessage()->getReplyToMessage()) {
        $replyText = $update->getMessage()->getReplyToMessage()->getText();

        if (str_contains($replyText, 'Введите число текущего месяца')) {
            (new \App\Telegram\Commands\DailyOrdersCommand())->processMessage($update);
            return response()->json(['status' => 'processed']);
        }
    }

    // Обработка стандартных команд типа /start, /orders и т.п.
    Telegram::commandsHandler(true);

    return response()->json(['status' => 'ok']);
});
