<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use App\Models\TelegramUser;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Запуск бота';

    public function handle()
    {
        $chat = $this->getUpdate()->getMessage()->getChat();
        $chatId = $chat->id;
        $username = $chat->username ?? null;
        $firstName = $chat->first_name ?? null;

        // Записываем пользователя в базу (или обновляем, если уже есть)
        TelegramUser::updateOrCreate(
            ['chat_id' => $chatId],
            ['username' => $username, 'first_name' => $firstName]
        );

        // Отправляем сообщение пользователю
        $this->replyWithMessage([
            'text' => "Вы подписаны на уведомления!!! ✅"
        ]);
    }
}
