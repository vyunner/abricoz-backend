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
            'id' => 1,
            'category_id' => 1,
            'name_ru' => 'Фрукты',
            'name_kz' => 'Жеміс',
            'name_en' => 'Fruits',
        ]);
        SubCategory::create([
            'id' => 2,
            'category_id' => 1,
            'name_ru' => 'Овощи',
            'name_kz' => 'Тамақтық нәрселер',
            'name_en' => 'Vegetables',
        ]);
        SubCategory::create([
            'id' => 3,
            'category_id' => 1,
            'name_ru' => 'Зелень',
            'name_kz' => 'Жапырақ',
            'name_en' => 'Greens',
        ]);
        SubCategory::create([
            'id' => 4,
            'category_id' => 1,
            'name_ru' => 'Грибы',
            'name_kz' => 'Күріш',
            'name_en' => 'Mushrooms',
        ]);
        SubCategory::create([
            'id' => 5,
            'category_id' => 4,
            'name_ru' => 'Молоко, сметана',
            'name_kz' => 'Сүт, каймак',
            'name_en' => 'Milk, cream',
        ]);
        SubCategory::create([
            'id' => 6,
            'category_id' => 4,
            'name_ru' => 'Йогурты, сырки',
            'name_kz' => 'Йогурттар, сыр қорытындары',
            'name_en' => 'Yogurts, cheese spreads',
        ]);
        SubCategory::create([
            'id' => 7,
            'category_id' => 4,
            'name_ru' => 'Сыры',
            'name_kz' => 'Сырлар',
            'name_en' => 'Cheeses',
        ]);
        SubCategory::create([
            'id' => 8,
            'category_id' => 4,
            'name_ru' => 'Яйца',
            'name_kz' => 'Жұмыртқалар',
            'name_en' => 'Eggs',
        ]);
        SubCategory::create([
            'id' => 9,
            'category_id' => 4,
            'name_ru' => 'Масло',
            'name_kz' => 'Мас',
            'name_en' => 'Butter',
        ]);
        SubCategory::create([
            'id' => 10,
            'category_id' => 6,
            'name_ru' => 'Кофе',
            'name_kz' => 'Кофе',
            'name_en' => 'Coffee',
        ]);
        SubCategory::create([
            'id' => 11,
            'category_id' => 6,
            'name_ru' => 'Чай',
            'name_kz' => 'Шай',
            'name_en' => 'Tea',
        ]);
        SubCategory::create([
            'id' => 12,
            'category_id' => 6,
            'name_ru' => 'Вода',
            'name_kz' => 'Су',
            'name_en' => 'Water',
        ]);
        SubCategory::create([
            'id' => 13,
            'category_id' => 6,
            'name_ru' => 'Газированные напитки',
            'name_kz' => 'Газ сусы',
            'name_en' => 'Soft drinks',
        ]);
        SubCategory::create([
            'id' => 14,
            'category_id' => 6,
            'name_ru' => 'Соки',
            'name_kz' => 'Сусы',
            'name_en' => 'Juices',
        ]);
        SubCategory::create([
            'id' => 15,
            'category_id' => 2,
            'name_ru' => 'Мясо',
            'name_kz' => 'Мақта',
            'name_en' => 'Meat',
        ]);
        SubCategory::create([
            'id' => 16,
            'category_id' => 2,
            'name_ru' => 'Птица',
            'name_kz' => 'Үйсініңдер',
            'name_en' => 'Poultry',
        ]);
        SubCategory::create([
            'id' => 17,
            'category_id' => 3,
            'name_ru' => 'Рыба',
            'name_kz' => 'Балық',
            'name_en' => 'Fish',
        ]);
        SubCategory::create([
            'id' => 18,
            'category_id' => 3,
            'name_ru' => 'Морепродукты',
            'name_kz' => 'Деуінділер',
            'name_en' => 'Seafood',
        ]);
        SubCategory::create([
            'id' => 19,
            'category_id' => 5,
            'name_ru' => 'Хлеб',
            'name_kz' => 'Нан',
            'name_en' => 'Bread',
        ]);
        SubCategory::create([
            'id' => 20,
            'category_id' => 5,
            'name_ru' => 'Выпечка',
            'name_kz' => 'Нан өнімдері',
            'name_en' => 'Bakery products',
        ]);
    }
}
