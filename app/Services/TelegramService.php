<?php

namespace App\Services;

use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Exceptions\TelegramResponseException;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    public function sendMessage($chatId, $message, $parse_mode = 'HTML')
    {
        try {
            return Telegram::bot('mybot')->sendMessage([
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => $parse_mode,
            ]);
        } catch (TelegramResponseException $e) {
            if (str_contains($e->getMessage(), 'bot was blocked by the user')) {
                Log::warning("Пользователь заблокировал Telegram-бота. chat_id: {$chatId}");
                return null; // Молча уходим
            }

            throw $e; // Другие ошибки — пробрасываем
        } catch (\Throwable $e) {
            Log::error("Ошибка отправки сообщения в Telegram: " . $e->getMessage());
            return null;
        }
    }
}
