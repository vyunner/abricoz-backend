<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductXlsxSeeder extends Seeder
{
    public function run()
    {
        // Путь к файлу Excel
        $filePath = base_path('database/seeders/xlsx/dastan01.03.xlsx');

        // Загружаем файл Excel
        try {
            $spreadsheet = IOFactory::load($filePath);
        } catch (\Exception $e) {
            echo 'Ошибка загрузки файла: ', $e->getMessage();
            return;
        }

        // Получаем активный лист
        $worksheet = $spreadsheet->getActiveSheet();

        // Преобразуем лист в массив
        $rows = $worksheet->toArray();

        // Первая строка - заголовки
        $headers = array_shift($rows);

        foreach ($rows as $row) {
            // Сопоставляем заголовки с данными
            $productData = array_combine($headers, $row);

            // Добавляем в базу данных
            DB::table('products')->insert([
                'subcategory_id' => $productData['subcategory_id'],
                'manufacturer' => $productData['manufacturer'],
                'name_ru' => $productData['name_ru'],
                'name_kz' => $productData['name_kz'],
                'description_ru' => $productData['description_ru'],
                'description_kz' => $productData['description_kz'],
                'price' => $productData['price'],
                'discount' => $productData['discount'],
                'price_with_discount' => $productData['price'] - ($productData['price'] * $productData['discount'] / 100),
                'photo_url' => $productData['photo_url'],
                'weight' => $productData['weight'],
                'calories' => $productData['calories'],
                'proteins' => $productData['proteins'],
                'fats' => $productData['fats'],
                'carbohydrates' => $productData['carbohydrates'],
                'is_active' => $productData['is_active'],
                'amount' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Путь к файлу Excel
        $filePath = base_path('database/seeders/xlsx/papapa.xlsx');

        // Загружаем файл Excel
        try {
            $spreadsheet = IOFactory::load($filePath);
        } catch (\Exception $e) {
            echo 'Ошибка загрузки файла: ', $e->getMessage();
            return;
        }

        // Получаем активный лист
        $worksheet = $spreadsheet->getActiveSheet();

        // Преобразуем лист в массив
        $rows = $worksheet->toArray();

        // Первая строка - заголовки
        $headers = array_shift($rows);

        foreach ($rows as $row) {
            // Сопоставляем заголовки с данными
            $productData = array_combine($headers, $row);

            // Добавляем в базу данных
            DB::table('products')->insert([
                'subcategory_id' => $productData['subcategory_id'],
                'manufacturer' => $productData['manufacturer'],
                'name_ru' => $productData['name_ru'],
                'name_kz' => $productData['name_kz'],
                'description_ru' => $productData['description_ru'],
                'description_kz' => $productData['description_kz'],
                'price' => $productData['price'],
                'discount' => $productData['discount'],
                'price_with_discount' => $productData['price'] - ($productData['price'] * $productData['discount'] / 100),
                'photo_url' => $productData['photo_url'],
                'weight' => $productData['weight'],
                'calories' => $productData['calories'],
                'proteins' => $productData['proteins'],
                'fats' => $productData['fats'],
                'carbohydrates' => $productData['carbohydrates'],
                'is_active' => $productData['is_active'],
                'amount' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
