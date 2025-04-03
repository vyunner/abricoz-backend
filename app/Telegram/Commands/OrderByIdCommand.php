<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class OrderByIdCommand extends Command
{
    protected string $name = 'order';
    protected string $description = 'Показать заказ по ID';

    public function handle()
    {
        $this->replyWithMessage([
            'text' => 'Введите № заказа:',
            'reply_markup' => json_encode(['force_reply' => true])
        ]);
    }

    public function processMessage($update)
    {
        $chatId = $update->getMessage()->getChat()->getId();
        $orderId = trim($update->getMessage()->getText());

        if (!is_numeric($orderId)) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Пожалуйста, введите корректный числовой № заказа.',
            ]);
            return;
        }

        $order = DB::table('orders')->where('id', $orderId)->first();

        if (!$order) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "Заказ с № {$orderId} не найден.",
            ]);
            return;
        }

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $deliveryInterval = DB::table('delivery_intervals')
            ->where('id', $order->delivery_interval_id)
            ->value('name_ru');

        $section->addText("Заказ №: {$order->id}", ['bold' => true, 'size' => 14]);
        $section->addText("Дата доставки: {$order->delivery_date}", ['size' => 12]);
        $section->addText("Временной интервал: {$deliveryInterval}", ['bold' => true, 'size' => 12]);
        $section->addTextBreak();

        $orderProducts = DB::table('order_products')
            ->where('order_id', $order->id)
            ->get();

        foreach ($orderProducts as $op) {
            $product = DB::table('products')->where('id', $op->product_id)->first();

            $section->addText("⬜ {$product->name_ru} {$product->weight} x {$op->product_quantity} ({$product->price_cost} тенге, {$op->product_price_with_discount} тенге)", ['size' => 12]);
            $section->addTextBreak();
        }

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $tempFilePath = storage_path('app/order_' . $orderId . '_' . uniqid() . '.docx');
        $writer->save($tempFilePath);

        Telegram::sendDocument([
            'chat_id' => $chatId,
            'document' => fopen($tempFilePath, 'r'),
            'filename' => "order_{$orderId}.docx",
            'caption' => "📄 Заказ №{$orderId}",
        ]);

        unlink($tempFilePath);
    }
}
