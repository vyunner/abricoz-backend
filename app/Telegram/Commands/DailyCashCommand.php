<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DailyCashCommand extends Command
{
    protected string $name = 'cash';
    protected string $description = 'Показать выручку по дате в этом месяце';

    public function handle()
    {
        $this->replyWithMessage([
            'text' => 'Введите число текущего месяца для вывода кассы',
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
            ->select('id', 'total_price', 'total_price_cost')
            ->get();

        if ($orders->isEmpty()) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "На {$date} заказов не найдено.",
            ]);
            return;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Заголовки
        $sheet->setCellValue('A1', 'Номер заказа');
        $sheet->setCellValue('B1', 'Сумма заказа');
        $sheet->setCellValue('C1', 'Себестоимость');
        $sheet->setCellValue('D1', 'Выручка');

        // Автоматическая ширина колонок
        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $row = 2;
        $totalOrders = 0;
        $totalSum = 0;
        $totalCost = 0;
        $totalProfit = 0;

        foreach ($orders as $order) {
            $profit = ($order->total_price ?? 0) - ($order->total_price_cost ?? 0);

            $sheet->setCellValue("A{$row}", $order->id);
            $sheet->setCellValue("B{$row}", (int) $order->total_price);
            $sheet->setCellValue("C{$row}", (int) $order->total_price_cost);
            $sheet->setCellValue("D{$row}", (int) $profit);

            $totalOrders++;
            $totalSum += (int) $order->total_price;
            $totalCost += (int) $order->total_price_cost;
            $totalProfit += (int) $profit;

            $row++;
        }

        // Пишем итоговые значения
        $sheet->setCellValue("A{$row}", 'Итого заказов:');
        $sheet->setCellValue("B{$row}", $totalOrders);
        $sheet->setCellValue("C{$row}", '');
        $sheet->setCellValue("D{$row}", '');

        $row++;

        $sheet->setCellValue("A{$row}", 'Итого сумма:');
        $sheet->setCellValue("B{$row}", $totalSum);

        $row++;

        $sheet->setCellValue("A{$row}", 'Итого себестоимость:');
        $sheet->setCellValue("B{$row}", $totalCost);

        $row++;

        $sheet->setCellValue("A{$row}", 'Итого выручка:');
        $sheet->setCellValue("B{$row}", $totalProfit);

        $tempFilePath = storage_path('app/orders_' . uniqid() . '.xlsx');
        (new Xlsx($spreadsheet))->save($tempFilePath);

        Telegram::sendDocument([
            'chat_id' => $chatId,
            'document' => fopen($tempFilePath, 'r'),
            'filename' => "orders_{$date}.xlsx",
            'caption' => "📄 Выручка по заказам за {$date}",
        ]);

        unlink($tempFilePath);
    }
}
