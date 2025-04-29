<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

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
            ->select('id', 'total_price', 'total_price_cost', 'delivery_interval_id')
            ->get();

        if ($orders->isEmpty()) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "На {$date} заказов не найдено.",
            ]);
            return;
        }

        // Предзагрузка всех интервалов доставки в память
        $intervals = DB::table('delivery_intervals')->pluck('name', 'id')->toArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Установка горизонтальной ориентации
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

        // Заголовки
        $sheet->setCellValue('A1', 'Номер заказа');
        $sheet->setCellValue('B1', 'Интервал доставки');
        $sheet->setCellValue('C1', 'Сумма заказа');
        $sheet->setCellValue('D1', 'Себестоимость');
        $sheet->setCellValue('E1', 'Выручка');
        $sheet->setCellValue('F1', 'Собрал');
        $sheet->setCellValue('G1', 'Доставил');

        // Автоматическая ширина колонок
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $row = 2;
        $totalOrders = 0;
        $totalSum = 0;
        $totalCost = 0;
        $totalProfit = 0;

        foreach ($orders as $order) {
            $profit = ($order->total_price ?? 0) - ($order->total_price_cost ?? 0);

            // Получаем интервал доставки по delivery_interval_id
            $deliveryIntervalName = $order->delivery_interval_id ? ($intervals[$order->delivery_interval_id] ?? '') : '';

            // Получаем сборщика и доставщика
            $assignments = DB::table('order_assignments')
                ->where('order_id', $order->id)
                ->get();

            $collector = '';
            $courier = '';

            foreach ($assignments as $assign) {
                $user = DB::table('users')->where('id', $assign->user_id)->first();
                if (!$user) {
                    continue;
                }

                $fullName = trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? ''));

                if ($assign->role_id == 2) {
                    $collector = $fullName;
                } elseif ($assign->role_id == 3) {
                    $courier = $fullName;
                }
            }

            // Заполняем строку
            $sheet->setCellValue("A{$row}", $order->id);
            $sheet->setCellValue("B{$row}", $deliveryIntervalName);
            $sheet->setCellValue("C{$row}", (int) $order->total_price);
            $sheet->setCellValue("D{$row}", (int) $order->total_price_cost);
            $sheet->setCellValue("E{$row}", (int) $profit);
            $sheet->setCellValue("F{$row}", $collector);
            $sheet->setCellValue("G{$row}", $courier);

            $totalOrders++;
            $totalSum += (int) $order->total_price;
            $totalCost += (int) $order->total_price_cost;
            $totalProfit += (int) $profit;

            $row++;
        }

        // Пишем итоговые значения
        $row++;
        $sheet->setCellValue("A{$row}", 'Итого заказов:');
        $sheet->setCellValue("B{$row}", $totalOrders);

        $row++;
        $sheet->setCellValue("A{$row}", 'Итого сумма:');
        $sheet->setCellValue("B{$row}", $totalSum);

        $row++;
        $sheet->setCellValue("A{$row}", 'Итого себестоимость:');
        $sheet->setCellValue("B{$row}", $totalCost);

        $row++;
        $sheet->setCellValue("A{$row}", 'Итого выручка:');
        $sheet->setCellValue("B{$row}", $totalProfit);

        $row++;
        $averageCheck = $totalOrders > 0 ? intval(round($totalSum / $totalOrders)) : 0;
        $sheet->setCellValue("A{$row}", 'Средний чек:');
        $sheet->setCellValue("B{$row}", $averageCheck);

        // Добавляем границы для всех заполненных ячеек
        $highestColumn = $sheet->getHighestColumn();
        $highestRow = $sheet->getHighestRow();

        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

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
