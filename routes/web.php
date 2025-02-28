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
    Telegram::commandsHandler(true);
    return response()->json(['status' => 'ok']);
});
