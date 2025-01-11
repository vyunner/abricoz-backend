<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductXlsxSeeder extends Seeder
{
    public function run()
    {
        // Path to the Excel file
        $filePath = base_path('database/seeders/2.xlsx');

        // Load the Excel file
        $data = Excel::toArray([], $filePath);

        // Assuming the data is in the first sheet
        $rows = $data[0];

        // Get the header row
        $headers = array_shift($rows);

        foreach ($rows as $row) {
            // Combine headers with row values
            $productData = array_combine($headers, $row);

            // Insert the data into the database
            DB::table('products')->insert([
                'subcategory_id' => $productData['subcategory_id'],
                'manufacturer' => $productData['manufacturer'],
                'name_ru' => $productData['name_ru'],
                'name_kz' => $productData['name_kz'],
                'name_en' => $productData['name_en'],
                'description_ru' => $productData['description_ru'],
                'description_kz' => $productData['description_kz'],
                'description_en' => $productData['description_en'],
                'price' => $productData['price'],
                'discount' => $productData['discount'],
                'photo_url' => $productData['photo_url'],
                'weight' => $productData['weight'],
                'calories' => $productData['calories'],
                'proteins' => $productData['proteins'],
                'fats' => $productData['fats'],
                'carbohydrates' => $productData['carbohydrates'],
                'is_active' => $productData['is_active'],
                'amount' => $productData['amount'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
