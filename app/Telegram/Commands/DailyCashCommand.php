<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class DailyCashCommand extends Command
{
    protected string $name = 'cash';
    protected string $description = 'Показать кассу по дате в этом месяце';

    public function handle()
    {
        $this->replyWithMessage([
            'text' => 'Введите число текущего месяца (например, 3) для вывода кассы:',
            'reply_markup' => json_encode(['force_reply' => true])
        ]);
    }

    public function processMessage($update)
    {
        $chatId = $update->getMessage()->getChat()->getId();
        $day = $update->getMessage()->getText();

        if (!is_numeric($day) || $day < 1 || $day > 31) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Пожалуйста, введите корректное число от 1 до 31.',
            ]);
            return;
        }

        $date = Carbon::now()->format('Y-m') . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);

        $orders = DB::table('orders')
            ->whereDate('delivery_date', $date)
            ->where('order_status_id', '!=', 6)
            ->get();

        if ($orders->isEmpty()) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "На {$date} заказов не найдено.",
            ]);
            return;
        }

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addText("Отчёт по заказам на {$date}", ['bold' => true, 'size' => 16]);
        $section->addTextBreak();

        foreach ($orders as $order) {
            $deliveryInterval = DB::table('delivery_intervals')
                ->where('id', $order->delivery_interval_id)
                ->value('name');

            // Формируем адрес
            $addressParts = [
                'улица' => $order->address_street_and_house ?: '–',
                'кв.' => $order->address_apartment ?: '–',
                'под.' => $order->address_entrance ?: '–',
                'эт.' => $order->address_floor ?: '–',
            ];

            $address = "{$addressParts['улица']}, {$addressParts['кв.']}, {$addressParts['под.']}, {$addressParts['эт.']}";
            $comment = $order->address_comment ?: 'Комментарий: –';

            $section->addText("Заказ №: {$order->id}", ['bold' => true, 'size' => 14]);
            $section->addText("Временной интервал: {$deliveryInterval}", ['bold' => true, 'size' => 14]);
            $section->addText("Адрес: {$address}", ['bold' => true, 'size' => 12]);
            $section->addText($comment, ['bold' => true, 'size' => 12]);
            $section->addTextBreak();

            $orderProducts = DB::table('order_products')
                ->where('order_id', $order->id)
                ->get();

            $productsData = [];

            foreach ($orderProducts as $op) {
                $product = DB::table('products')->where('id', $op->product_id)->first();
                $subcategory = DB::table('subcategories')->where('id', $product->subcategory_id)->first();

                $subcategoryName = $subcategory->name_ru ?? 'Без подкатегории';

                $productsData[$subcategoryName][] = [
                    'name' => $product->name_ru,
                    'weight' => $product->weight,
                    'quantity' => $op->product_quantity,
                    'price_cost' => $product->price_cost,
                    'price_discount' => $op->product_price_with_discount,
                ];
            }

            // Сортировка по названию подкатегорий
            ksort($productsData);

            foreach ($productsData as $subcategoryName => $products) {
                $section->addText("Подкатегория: {$subcategoryName}", ['bold' => true, 'size' => 13]);
                $section->addTextBreak();

                foreach ($products as $product) {
                    $textRun = $section->addTextRun();
                    $textRun->addText("⬜ {$product['name']} {$product['weight']} ({$product['price_cost']} тенге, {$product['price_discount']} тенге) ", ['size' => 12]);
                    $textRun->addText("*{$product['quantity']}", ['bold' => true, 'size' => 18]);
                }

                $section->addText(''); // пустая строка между подкатегориями
            }

            $section->addText('------------------------');
            $section->addPageBreak();
        }

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $tempFilePath = storage_path('app/orders_' . uniqid() . '.docx');
        $writer->save($tempFilePath);

        Telegram::sendDocument([
            'chat_id' => $chatId,
            'document' => fopen($tempFilePath, 'r'),
            'filename' => "orders_{$date}.docx",
            'caption' => "📄 Отчёт по заказам на {$date}",
        ]);

        unlink($tempFilePath);
    }
}
