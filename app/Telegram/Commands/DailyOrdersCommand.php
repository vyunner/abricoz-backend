<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Actions;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Models\Order;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Storage;

class DailyOrdersCommand extends Command
{
    protected $name = 'orders';
    protected $description = 'Показать продукты по дате доставки в этом месяце';

    public function handle()
    {
        $this->replyWithMessage(['text' => 'Введите число текущего месяца (например, 3):']);

        Telegram::sendMessage([
            'chat_id' => $this->getUpdate()->getMessage()->getChat()->getId(),
            'text' => 'Ожидаю число...',
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

        // Генерируем Word документ в памяти
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText("Отчёт по заказам на {$date}", ['bold' => true, 'size' => 16]);
        $section->addTextBreak();

        foreach ($orders as $order) {
            $section->addText("Заказ ID: {$order->id}");
            $section->addText("Дата доставки: {$order->delivery_date}");

            $orderProducts = DB::table('order_products')
                ->where('order_id', $order->id)
                ->get();

            foreach ($orderProducts as $op) {
                $product = DB::table('products')->where('id', $op->product_id)->first();

                $section->addText("  └ Продукт ID: {$op->product_id}");
                $section->addText("     Кол-во: {$op->product_quantity}");
                $section->addText("     Цена со скидкой: {$op->product_price_with_discount}");
                $section->addText("     Себестоимость: {$product->price_cost}");
                $section->addText("     Фото: {$product->photo_url}");
                $section->addTextBreak();
            }

            $section->addText('------------------------');
        }

        // Создаём поток в памяти
        $tempStream = fopen('php://temp', 'r+');
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempStream);
        rewind($tempStream); // вернёмся в начало потока

        // Отправляем как документ
        Telegram::sendDocument([
            'chat_id' => $chatId,
            'document' => $tempStream,
            'filename' => "orders_{$date}.docx",
            'caption' => "📄 Отчёт по заказам на {$date}",
        ]);

        fclose($tempStream); // очищаем
    }
}
