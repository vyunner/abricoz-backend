<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class RemainingProductsCommand extends Command
{
    protected string $name = 'remaining';
    protected string $description = 'Показать остатки всех активных продуктов';

    public function handle()
    {
        $chatId = $this->getUpdate()->getMessage()->getChat()->getId();

        $products = DB::table('products')
            ->where('is_active', 1)
            ->get();

        if ($products->isEmpty()) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Активных продуктов с остатками не найдено.',
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

        // Сортировка подкатегорий по суммарному amount
        $subcategoryTotals = [];
        foreach ($grouped as $subcategoryName => $products) {
            $totalAmount = array_sum(array_column($products, 'amount'));
            $subcategoryTotals[$subcategoryName] = $totalAmount;
        }

        arsort($subcategoryTotals);
        $sortedGrouped = [];
        foreach (array_keys($subcategoryTotals) as $subcategoryName) {
            $products = $grouped[$subcategoryName];
            usort($products, fn($a, $b) => $b['amount'] <=> $a['amount']);
            $sortedGrouped[$subcategoryName] = $products;
        }

        // Создание Word-документа
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText("Остатки активных продуктов", ['bold' => true, 'size' => 16]);
        $section->addTextBreak();

        foreach ($sortedGrouped as $subcategoryName => $products) {
            $textRun = $section->addTextRun();
            $textRun->addText('Подкатегория: ', ['bold' => true, 'size' => 13]);
            $textRun->addText($subcategoryName, ['size' => 13]);
            $section->addTextBreak();

            foreach ($products as $product) {
                $textRun = $section->addTextRun();
                $textRun->addText("{$product['name']} {$product['weight']} — ", ['size' => 12]);
                $textRun->addText("*{$product['amount']}", ['bold' => true, 'size' => 18]);
            }

            $section->addTextBreak();
        }

        // Пути и имена файлов
        $date = now()->format('Y-m-d');
        $unique = uniqid();
        $filenameBase = "remaining_{$date}_{$unique}";
        $wordPath = storage_path("app/{$filenameBase}.docx");
        $htmlPath = storage_path("app/{$filenameBase}.html");

        // Сохраняем DOCX
        $wordWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $wordWriter->save($wordPath);

        // Сохраняем HTML
        $htmlWriter = IOFactory::createWriter($phpWord, 'HTML');
        $htmlWriter->save($htmlPath);

        // Отправка двух документов
        Telegram::sendMediaGroup([
            'chat_id' => $chatId,
            'media' => [
                [
                    'type' => 'document',
                    'media' => InputFile::create($wordPath),
                    'caption' => "📄 DOCX: Остатки на {$date}",
                ],
                [
                    'type' => 'document',
                    'media' => InputFile::create($htmlPath),
                    'caption' => "🌐 HTML: Остатки на {$date}",
                ],
            ],
        ]);

        // Удаляем временные файлы
        unlink($wordPath);
        unlink($htmlPath);
    }
}
