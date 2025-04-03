<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class ProductsByDayCommand extends Command
{
    protected string $name = 'products';
    protected string $description = 'Показать закупленные продукты по дню месяца';

    public function handle()
    {
        $this->replyWithMessage([
            'text' => 'Введите число текущего месяца для вывода закупок',
            'reply_markup' => json_encode(['force_reply' => true])
        ]);
    }

    public function processMessage($update)
    {
        $chatId = $update->getMessage()->getChat()->getId();
        $day = trim($update->getMessage()->getText());

        if (!is_numeric($day) || $day < 1 || $day > 31) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Пожалуйста, введите корректное число от 1 до 31.',
            ]);
            return;
        }

        $date = Carbon::now()->format('Y-m') . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);

        $orderIds = DB::table('orders')
            ->whereDate('delivery_date', $date)
            ->pluck('id');

        if ($orderIds->isEmpty()) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "На {$date} заказов не найдено.",
            ]);
            return;
        }

        $productData = DB::table('order_products')
            ->select('product_id', DB::raw('SUM(product_quantity) as total_quantity'))
            ->whereIn('order_id', $orderIds)
            ->groupBy('product_id')
            ->get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText("Список всех продуктов на {$date}", ['bold' => true, 'size' => 16]);
        $section->addTextBreak();

        foreach ($productData as $item) {
            $product = DB::table('products')->where('id', $item->product_id)->first();
            if (!$product) continue;

            $section->addText("📦 {$product->name_ru} {$product->weight}", ['bold' => true]);
            $section->addText("▪ Кол-во: {$item->total_quantity}");
            $section->addText("▪ Закуп: {$product->price_cost} тенге");
            $section->addText("▪ Цена со скидкой: {$product->price_discount} тенге");
            $section->addTextBreak();
        }

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $tempFilePath = storage_path('app/products_' . uniqid() . '.docx');
        $writer->save($tempFilePath);

        Telegram::sendDocument([
            'chat_id' => $chatId,
            'document' => fopen($tempFilePath, 'r'),
            'filename' => "products_{$date}.docx",
            'caption' => "📄 Список продуктов на {$date}",
        ]);

        unlink($tempFilePath);
    }
}
