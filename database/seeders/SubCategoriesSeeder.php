<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::create([
            'category_id' => 1,
            'name_ru' => 'Фрукты',
            'name_kz' => 'Жеміс',
            'name_en' => 'Fruits',
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name_ru' => 'Овощи',
            'name_kz' => 'Тамақтық нәрселер',
            'name_en' => 'Vegetables',
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name_ru' => 'Зелень',
            'name_kz' => 'Жапырақ',
            'name_en' => 'Greens',
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name_ru' => 'Грибы',
            'name_kz' => 'Күріш',
            'name_en' => 'Mushrooms',
        ]);
    }
}
