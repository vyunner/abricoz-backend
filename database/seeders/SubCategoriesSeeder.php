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
            'image_url' => '/storage/subcategories/fruits.png',
            'name_ru' => 'Фрукты',
            'name_kz' => 'Жеміс',
        ]);
        SubCategory::create([
            'id' => 2,
            'category_id' => 1,
            'image_url' => '/storage/subcategories/ovoshi.png',
            'name_ru' => 'Овощи',
            'name_kz' => 'Тамақтық нәрселер',
        ]);
        SubCategory::create([
            'id' => 3,
            'category_id' => 1,
            'image_url' => '/storage/subcategories/zelen.png',
            'name_ru' => 'Зелень',
            'name_kz' => 'Жапырақ',
        ]);
        SubCategory::create([
            'id' => 4,
            'category_id' => 1,
            'image_url' => '/storage/subcategories/gribi.png',
            'name_ru' => 'Грибы',
            'name_kz' => 'Күріш',
        ]);
        SubCategory::create([
            'id' => 5,
            'category_id' => 4,
            'image_url' => '/storage/subcategories/moloko.png',
            'name_ru' => 'Молоко, сметана',
            'name_kz' => 'Сүт, каймак',
        ]);
        SubCategory::create([
            'id' => 6,
            'category_id' => 4,
            'image_url' => '/storage/subcategories/yogurti.png',
            'name_ru' => 'Йогурты, сырки',
            'name_kz' => 'Йогурттар, сыр қорытындары',
        ]);
        SubCategory::create([
            'id' => 7,
            'category_id' => 4,
            'image_url' => '/storage/subcategories/sir.png',
            'name_ru' => 'Сыры',
            'name_kz' => 'Сырлар',
        ]);
        SubCategory::create([
            'id' => 8,
            'category_id' => 4,
            'image_url' => '/storage/subcategories/yaico.png',
            'name_ru' => 'Яйца',
            'name_kz' => 'Жұмыртқалар',
        ]);
        SubCategory::create([
            'id' => 9,
            'category_id' => 4,
            'image_url' => '/storage/subcategories/maslo.png',
            'name_ru' => 'Масло',
            'name_kz' => 'Мас',
        ]);
        SubCategory::create([
            'id' => 10,
            'category_id' => 6,
            'image_url' => '/storage/subcategories/kofe.png',
            'name_ru' => 'Кофе',
            'name_kz' => 'Кофе',
        ]);
        SubCategory::create([
            'id' => 11,
            'category_id' => 6,
            'image_url' => '/storage/subcategories/chai.png',
            'name_ru' => 'Чай',
            'name_kz' => 'Шай',
        ]);
        SubCategory::create([
            'id' => 12,
            'category_id' => 6,
            'image_url' => '/storage/subcategories/voda.png',
            'name_ru' => 'Вода',
            'name_kz' => 'Су',
        ]);
        SubCategory::create([
            'id' => 13,
            'category_id' => 6,
            'image_url' => '/storage/subcategories/gaz.png',
            'name_ru' => 'Газированные напитки',
            'name_kz' => 'Газ сусы',
        ]);
        SubCategory::create([
            'id' => 14,
            'category_id' => 2,
            'image_url' => '/storage/subcategories/myaso.png',
            'name_ru' => 'Мясо',
            'name_kz' => 'Мақта',
        ]);
        SubCategory::create([
            'id' => 15,
            'category_id' => 2,
            'image_url' => '/storage/subcategories/ptica.png',
            'name_ru' => 'Птица',
            'name_kz' => 'Үйсініңдер',
        ]);
        SubCategory::create([
            'id' => 16,
            'category_id' => 3,
            'image_url' => '/storage/subcategories/riba.png',
            'name_ru' => 'Рыба',
            'name_kz' => 'Балық',
        ]);
        SubCategory::create([
            'id' => 17,
            'category_id' => 3,
            'image_url' => '/storage/subcategories/more.png',
            'name_ru' => 'Морепродукты',
            'name_kz' => 'Деуінділер',
        ]);
        SubCategory::create([
            'id' => 18,
            'category_id' => 5,
            'image_url' => '/storage/subcategories/hleb.png',
            'name_ru' => 'Хлеб',
            'name_kz' => 'Нан',
        ]);
        SubCategory::create([
            'id' => 19,
            'category_id' => 5,
            'image_url' => '/storage/subcategories/vipechka.png',
            'name_ru' => 'Выпечка',
            'name_kz' => 'Нан өнімдері',
        ]);
        SubCategory::create([
            'id' => 20,
            'category_id' => 14,
            'image_url' => '/storage/subcategories/household_goods_mobile.png',
            'name_ru' => 'Хоз товары',
            'name_kz' => 'Тұрмыстық тауарлар',
        ]);
    }
}
