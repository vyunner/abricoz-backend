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
    protected string $description = 'Показать заказ по №';

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
            ->value('name');

        // Формируем адрес с обработкой null
        $address = sprintf(
            "%s, кв. %s, под. %s, эт. %s",
            $order->address_street_and_house ?: '–',
            $order->address_apartment ?: '–',
            $order->address_entrance ?: '–',
            $order->address_floor ?: '–'
        );
        $comment = $order->address_comment ? "Комментарий: {$order->address_comment}" : "Комментарий: –";

        $section->addText("Заказ №: {$order->id}", ['bold' => true, 'size' => 14]);
        $section->addText("Дата доставки: {$order->delivery_date}", ['bold' => true, 'size' => 12]);
        $section->addText("Временной интервал: {$deliveryInterval}", ['bold' => true, 'size' => 12]);
        $section->addText("Адрес: {$address}", ['bold' => true, 'size' => 12]);
        $section->addText($comment, ['bold' => true, 'size' => 12]);
        $section->addTextBreak();

        // Загружаем продукты заказа
        $orderProducts = DB::table('order_products')
            ->where('order_id', $order->id)
            ->get();

        // Группируем по подкатегориям
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

        // Сортировка по подкатегориям
        ksort($productsData);

        $sumDiscount = 0;

        foreach ($productsData as $subcategoryName => $products) {

            $textRun = $section->addTextRun();
            $textRun->addText('Подкатегория: ', ['bold' => true, 'size' => 13]);
            $textRun->addText($subcategoryName, ['size' => 13]);
            $section->addTextBreak();

            foreach ($products as $product) {
                $sumProduct = $product['price_discount'] * $product['quantity'];
                $sumDiscount += $sumProduct;

                $textRun = $section->addTextRun();
                $textRun->addText("⬜ {$product['name']} ", ['size' => 12]);
                $textRun->addText("{$product['quantity']}", ['bold' => true, 'size' => 18]);
                $textRun->addText(" x {$product['weight']} ({$product['price_discount']} тенге) = $sumProduct тенге", ['size' => 12]);
            }

            $section->addTextBreak();

        }

        $textRun = $section->addTextRun();
        $textRun->addText("Сумма: {$sumDiscount}", ['size' => 12]);

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
