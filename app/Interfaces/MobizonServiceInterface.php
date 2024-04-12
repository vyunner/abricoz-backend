<?php

namespace App\Interfaces;

interface MobizonServiceInterface
{
    public function sendSmsMessage($recipient, $text, $from = null, $params = []): array;

    public function getSmsStatus($ids): array;

    public function listMessages($criteria = [], $pagination = [], $sort = [], $withNumberInfo = 0): array;
}
