<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class ExpiredProductsCommand extends Command
{
    protected string $name = 'expired';
    protected string $description = 'Показать закончившиеся и заканчивающиеся продукты';

    public function handle()
    {
        $chatId = $this->getUpdate()->getMessage()->getChat()->getId();

        $products = DB::table('products')
            ->where('is_active', 1)
            ->where('amount', '<=', 5)
            ->get();

        if ($products->isEmpty()) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Нет продуктов, которые закончились или заканчиваются 😊',
            ]);
            return;
        }

        // Группировка по подкатегориям
        $grouped = [];

        foreach ($products as $product) {
            $subcategory = DB::table('subcategories')->where('id', $product->subcategory_id)->first();
            $subcategoryName = $subcategory->name_ru ?? 'Без подкатегории';

            $grouped[$subcategoryName][] = [
                'name' => $product->name_ru,
                'weight' => $product->weight,
                'amount' => $product->amount,
            ];
        }

        // Сортируем подкатегории по алфавиту
        ksort($grouped);

        // Сортировка внутри подкатегорий:
        // Сначала amount == 0, потом по возрастанию
        foreach ($grouped as &$productsList) {
            usort($productsList, function ($a, $b) {
                if ($a['amount'] == 0 && $b['amount'] != 0) return -1;
                if ($a['amount'] != 0 && $b['amount'] == 0) return 1;
                return $a['amount'] <=> $b['amount'];
            });
        }
        unset($productsList);

        // Генерация Word-документа
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText("Закончившиеся и заканчивающиеся продукты", ['bold' => true, 'size' => 16]);
        $section->addTextBreak();

        foreach ($grouped as $subcategoryName => $productsList) {
            $textRun = $section->addTextRun();
            $textRun->addText('Подкатегория: ', ['bold' => true, 'size' => 13]);
            $textRun->addText($subcategoryName, ['size' => 13]);
            $section->addTextBreak();

            foreach ($productsList as $product) {
                $symbol = $product['amount'] == 0 ? '🟥' : '🟨';
                $textRun = $section->addTextRun();
                $textRun->addText("{$symbol} {$product['name']} {$product['weight']} — ", ['size' => 12]);
                $textRun->addText("*{$product['amount']}", ['bold' => true, 'size' => 18]);
            }

            $section->addTextBreak();
        }

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $date = now()->format('Y-m-d');
        $tempFilePath = storage_path("app/expired_{$date}_" . uniqid() . ".docx");
        $writer->save($tempFilePath);

        Telegram::sendDocument([
            'chat_id' => $chatId,
            'document' => fopen($tempFilePath, 'r'),
            'filename' => "expired_{$date}.docx",
            'caption' => "📉 Закончившиеся и заканчивающиеся продукты на {$date}",
        ]);

        unlink($tempFilePath);
    }
}
