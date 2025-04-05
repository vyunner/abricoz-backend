<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class DailyOrdersCommand extends Command
{
    protected string $name = 'orders';
    protected string $description = 'Показать продукты по дате доставки в этом месяце';

    public function handle()
    {
        $this->replyWithMessage([
            'text' => 'Введите число текущего месяца (например, 3):',
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
        $orders = DB::table('orders')->whereDate('delivery_date', $date)->get();

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

            $section->addText("Заказ №: {$order->id}", ['bold' => true, 'size' => 14]);
            $section->addText("Временной интервал: {$deliveryInterval}", ['bold' => true, 'size' => 14]);
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
