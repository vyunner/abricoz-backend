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
            'photo_url' => '/storage/categories/apple.svg',
        ]);
        Category::create([
            'name_ru' => 'Мясная продукция',
            'name_kz' => 'Мақта өнімдері',
            'name_en' => 'Meat products',
            'photo_url' => '/storage/categories/drumstick.svg',
        ]);
        Category::create([
            'name_ru' => 'Рыба и морепродукты',
            'name_kz' => 'Балық және деуінділер',
            'name_en' => 'Fish and seafood',
            'photo_url' => '/storage/categories/fish.svg',
        ]);
        Category::create([
            'name_ru' => 'Молоко, сыр, масло, яйца',
            'name_kz' => 'Сүт, сыр, мас, жұмыртқа',
            'name_en' => 'Milk, cheese, butter, eggs',
            'photo_url' => '/storage/categories/milk.svg',
        ]);
        Category::create([
            'name_ru' => 'Хлеб, выпечка',
            'name_kz' => 'Нан, нан өнімдері',
            'name_en' => 'Bread, bakery products',
            'photo_url' => '/storage/categories/bagguette.svg',
        ]);
        Category::create([
            'name_ru' => 'Напитки и соки',
            'name_kz' => 'Ішкіліктер мен сусы',
            'name_en' => 'Beverages and juices',
            'photo_url' => '/storage/categories/drink.svg',
        ]);
    }
}
