<?php

namespace App\Interfaces;

interface MobizonServiceInterface
{
    public function sendSmsMessage(string $recipient, string $text, mixed $from = null, array $params = []): array;

    public function getSmsStatus(array|string $ids): array;

    public function listMessages(array $criteria = [], array $pagination = [], array $sort = [], int $withNumberInfo = 0): array;
}
