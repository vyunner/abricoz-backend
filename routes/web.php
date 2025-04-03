<?php

use App\Http\Controllers\WebAdmin;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Http\Request;
use App\Telegram\Commands\DailyOrdersCommand;
use App\Telegram\Commands\OrderByIdCommand;
use App\Telegram\Commands\ProductsByDayCommand;

Route::view('/UHoxHPD8bV1sCc1uIj8lWUmO', 'otp-verification')->name('welcome');
Route::post('/send-otp', WebAdmin\SendCodeController::class)->middleware(['throttle:1,1'])->name('send.otp');
Route::post('/verify-otp', WebAdmin\LoginController::class)->name('verify.otp');

Route::get('/dashboard', function () {
    return "You are logged in!";
})->middleware('auth')->name('dashboard');

Route::post('/telegram/webhook', function (Request $request) {
    $update = Telegram::getWebhookUpdate();

    if ($update->isType('message') && $update->getMessage()->getReplyToMessage()) {
        $replyText = $update->getMessage()->getReplyToMessage()->getText();

        if (str_contains($replyText, 'Введите число текущего месяца') && $replyText === 'Введите число текущего месяца (например, 3):') {
            (new DailyOrdersCommand())->processMessage($update);
            return response()->json(['status' => 'orders processed']);
        }

        if (str_contains($replyText, 'Введите № заказа')) {
            (new OrderByIdCommand())->processMessage($update);
            return response()->json(['status' => 'order processed']);
        }

        if (str_contains($replyText, 'Введите число текущего месяца для вывода закупок')) {
            (new ProductsByDayCommand())->processMessage($update);
            return response()->json(['status' => 'products processed']);
        }
    }

    Telegram::commandsHandler(true);
    return response()->json(['status' => 'ok']);
});
