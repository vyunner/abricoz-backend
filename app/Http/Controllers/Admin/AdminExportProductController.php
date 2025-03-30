<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use ZipArchive;
use App\Models\Product;
use Throwable;

/**
 * @group Admin
 */
class AdminExportProductController extends Controller
{
    /**
     * ExportProduct
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:zip',
        ]);

        try {
            // Сохраняем архив во временное место
            $zipPath = $request->file('file')->storeAs('temp', 'import.zip');
            $zipFullPath = storage_path("app/{$zipPath}");
            $extractPath = storage_path("app/temp/import");

            // Распаковка архива
            $zip = new ZipArchive;
            if ($zip->open($zipFullPath) !== TRUE) {
                return response()->json(['error' => 'Не удалось открыть архив'], 500);
            }

            // Очищаем предыдущие данные, если нужно
            if (is_dir($extractPath)) {
                collect(scandir($extractPath))->each(function ($file) use ($extractPath) {
                    if (!in_array($file, ['.', '..'])) {
                        unlink($extractPath . DIRECTORY_SEPARATOR . $file);
                    }
                });
            } else {
                mkdir($extractPath, 0777, true);
            }

            $zip->extractTo($extractPath);
            $zip->close();

            // Проверка наличия файла Excel
            $excelPath = "{$extractPath}/excel.xlsx";
            if (!file_exists($excelPath)) {
                return response()->json(['error' => 'Файл excel.xlsx не найден в архиве'], 400);
            }

            // Чтение Excel
            $spreadsheet = IOFactory::load($excelPath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Транзакция
            DB::beginTransaction();

            for ($i = 1; $i < count($rows); $i++) {
                $data = $rows[$i];

                // Простейшая проверка данных
                if (!isset($data[0]) || !isset($data[1])) {
                    throw new \Exception("Ошибка в строке {$i}: отсутствуют обязательные поля.");
                }

                // Создаём продукт
                $product = Product::create([
                    'name' => $data[0],
                    'price' => $data[1],
                    'description' => $data[2] ?? null,
                ]);

                // Обработка изображения
                $imageName = ($i + 1) . '.webp';
                $imagePath = "{$extractPath}/{$imageName}";

                if (file_exists($imagePath)) {
                    $tempFile = fopen($imagePath, 'r');

                    // Загружаем в S3
                    $path = Storage::disk('s3')->put('products', $tempFile, 'public');
                    $photoUrl = Storage::disk('s3')->url($path);

                    // Обновляем продукт
                    $product->update(['photo_url' => $photoUrl]);

                    fclose($tempFile);
                }

            }

            DB::commit();
            return response()->json(['success' => true]);
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Произошла ошибка при импорте продуктов',
                'message' => $e->getMessage(),
                'trace' => config('app.debug') ? $e->getTraceAsString() : null,
            ], 500);
        }
    }
}
