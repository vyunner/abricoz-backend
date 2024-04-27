<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name_ru' => 'Фрукты и овощи',
            'name_kz' => 'Жеміс және тамақтық нәрселер',
            'name_en' => 'Fruits and vegetables',
        ]);
        Category::create([
            'name_ru' => 'Мясо и птица',
            'name_kz' => 'Мақта және құс',
            'name_en' => 'Meat and poultry',
        ]);
        Category::create([
            'name_ru' => 'Рыба и морепродукты',
            'name_kz' => 'Балық және деуінділер',
            'name_en' => 'Fish and seafood',
        ]);
    }
}
