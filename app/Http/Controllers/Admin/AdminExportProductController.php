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
use Illuminate\Support\Str;

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
                        $fullPath = $extractPath . DIRECTORY_SEPARATOR . $file;

                        if (is_file($fullPath)) {
                            unlink($fullPath);
                        } elseif (is_dir($fullPath)) {
                            // Удаляем вложенные папки и их содержимое
                            collect(scandir($fullPath))->each(function ($subFile) use ($fullPath) {
                                if (!in_array($subFile, ['.', '..'])) {
                                    $subPath = $fullPath . DIRECTORY_SEPARATOR . $subFile;
                                    if (is_file($subPath)) {
                                        unlink($subPath);
                                    }
                                }
                            });
                            rmdir($fullPath);
                        }
                    }
                });
            } else {
                mkdir($extractPath, 0777, true);
            }

            $zip->extractTo($extractPath);
            $zip->close();

            // Поиск Excel-файла в папке (игнорируем регистр)
            $excelFile = collect(scandir($extractPath))
                ->first(fn($file) => preg_match('/^excel\.xlsx$/i', $file));

            if (!$excelFile) {
                return response()->json([
                    'error' => 'Файл excel.xlsx не найден в архиве',
                    'found_files' => scandir($extractPath) // 👈 покажем, что реально найдено
                ], 400);
            }

            $excelPath = "{$extractPath}/{$excelFile}";

            // Чтение Excel
            $spreadsheet = IOFactory::load($excelPath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Транзакция
            DB::beginTransaction();

            for ($i = 1; $i < count($rows); $i++) {
                $data = $rows[$i];

                // Пропускаем пустые строки
                if (empty(array_filter($data))) {
                    continue;
                }

                // Проверка обязательных полей (например, name и price)
                if (empty($data[0]) || empty($data[1])) {
                    throw new \Exception("Ошибка в строке " . ($i + 1) . ": отсутствуют обязательные поля.");
                }

                // Создаём продукт
                $product = Product::create([
                    'subcategory_id' => $data[0],
                    'name_ru' => $data[1],
                    'name_kz' => $data[2],
                    'description_ru' => $data[3],
                    'description_kz' => $data[4],
                    'weight' => $data[5],
                    'calories' => $data[6],
                    'proteins' => $data[7],
                    'fats' => $data[8],
                    'carbohydrates' => $data[9],
                    'price' => $data[10],
                    'discount' => $data[11],
                    'price_with_discount' => $data[12],
                    'price_cost' => $data[13],
                    'total_sales' => $data[14],
                    'amount' => $data[15],
                    'is_active' => $data[16],
                ]);

                // Обработка изображения
                $imageName = ($i + 1) . '.webp';
                $imagePath = "{$extractPath}/{$imageName}";

                if (file_exists($imagePath)) {
                    $tempFile = fopen($imagePath, 'r');

                    $uniqueName = Str::uuid() . '.webp';
                    $path = 'products/' . $uniqueName;

                    Storage::disk('s3')->put($path, $tempFile, 'public');
                    $photoUrl = Storage::disk('s3')->url($path);

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
