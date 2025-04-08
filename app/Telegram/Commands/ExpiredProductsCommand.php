<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;
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
            ->where('amount', '<=', 3)
            ->get();

        if ($products->isEmpty()) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Нет продуктов, которые закончились или заканчиваются',
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

        // Сортировка подкатегорий по алфавиту
        ksort($grouped);

        // Сортировка продуктов внутри подкатегории
        foreach ($grouped as &$productsList) {
            usort($productsList, fn($a, $b) => $b['amount'] <=> $a['amount']);
        }
        unset($productsList);

        // Генерация Word и HTML документов
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

        // Сохраняем документы
        $date = now()->format('Y-m-d');
        $unique = uniqid();
        $filenameBase = "expired_{$date}_{$unique}";
        $wordPath = storage_path("app/{$filenameBase}.docx");
        $htmlPath = storage_path("app/{$filenameBase}.html");

        $wordWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $wordWriter->save($wordPath);

        $htmlWriter = IOFactory::createWriter($phpWord, 'HTML');
        $htmlWriter->save($htmlPath);

        // Отправляем два файла отдельно
        Telegram::sendDocument([
            'chat_id' => $chatId,
            'document' => InputFile::create($wordPath),
            'caption' => "📄 DOCX: Закончившиеся продукты на {$date}",
        ]);

        Telegram::sendDocument([
            'chat_id' => $chatId,
            'document' => InputFile::create($htmlPath),
            'caption' => "🌐 HTML: Закончившиеся продукты на {$date}",
        ]);

        // Удаляем временные файлы
        unlink($wordPath);
        unlink($htmlPath);
    }
}
