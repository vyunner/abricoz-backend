<?php

namespace App\Services;

use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramService
{
    public function sendMessage($chatId, $message)
    {
        return Telegram::bot('mybot')->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'MarkdownV2',
        ]);
    }
}
