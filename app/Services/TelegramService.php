<?php

namespace App\Services;

use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramService
{
    public function sendMessage($chatId, $message, $parse_mode = 'HTML')
    {
        return Telegram::bot('mybot')->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => $parse_mode,
        ]);
    }
}
