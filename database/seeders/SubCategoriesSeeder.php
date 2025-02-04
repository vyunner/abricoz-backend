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
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/hgzdr3drbYxKgypHhrye6la6DZpi8JqXLpi7HMAL.webp',
            'name_ru' => 'Фрукты',
            'name_kz' => 'Жеміс',
        ]);
        SubCategory::create([
            'id' => 2,
            'category_id' => 1,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/TsuCNjcATeaWSkeAc8jWwpE65Lcka9umiBJTQiXX.webp',
            'name_ru' => 'Овощи',
            'name_kz' => 'Тамақтық нәрселер',
        ]);
        SubCategory::create([
            'id' => 3,
            'category_id' => 1,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/vU66nIfPP5mGIvWL5JY0mPpF61Qxk5HatYNjx4Hz.webp',
            'name_ru' => 'Зелень',
            'name_kz' => 'Жапырақ',
        ]);
        SubCategory::create([
            'id' => 4,
            'category_id' => 1,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/8SP7apgG8gu8EaYwbP2fNYpKPmeow2f86hYQuyFo.webp',
            'name_ru' => 'Грибы',
            'name_kz' => 'Күріш',
        ]);
        SubCategory::create([
            'id' => 5,
            'category_id' => 4,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/yr9i7kYg7nQdyVSjnGWUrBLuFIvdUDX9UWCztZmk.webp',
            'name_ru' => 'Молоко, сметана',
            'name_kz' => 'Сүт, каймак',
        ]);
        SubCategory::create([
            'id' => 6,
            'category_id' => 4,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/iHBltCpCdRGpJe5EEI0mdac9889qpwiRsPs0frwA.webp',
            'name_ru' => 'Йогурты, сырки',
            'name_kz' => 'Йогурттар, сыр қорытындары',
        ]);
        SubCategory::create([
            'id' => 7,
            'category_id' => 4,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/kSsJr5hIYof9CqyGO4eBjBIyGrMW86Xznj9mS0oq.webp',
            'name_ru' => 'Сыры',
            'name_kz' => 'Сырлар',
        ]);
        SubCategory::create([
            'id' => 8,
            'category_id' => 4,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/q6be5zWZcPBw92Vx0jJ8mMS9vUQP4gpG0JEtIQvh.webp',
            'name_ru' => 'Яйца',
            'name_kz' => 'Жұмыртқалар',
        ]);
        SubCategory::create([
            'id' => 9,
            'category_id' => 4,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/wLUrTUaDQP6MOPVxyEyQeh3pNBA0oEKBOEwKtUVb.webp',
            'name_ru' => 'Масло',
            'name_kz' => 'Мас',
        ]);
        SubCategory::create([
            'id' => 10,
            'category_id' => 6,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/5lYsMNWl5nrYPMc9NX0Ahmm60FQcUjZKXbrJKihO.webp',
            'name_ru' => 'Кофе',
            'name_kz' => 'Кофе',
        ]);
        SubCategory::create([
            'id' => 11,
            'category_id' => 6,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/D6aAmNcEJISKpvfrduXOcnkfgNG6tRw0NeaDGBKt.webp',
            'name_ru' => 'Чай',
            'name_kz' => 'Шай',
        ]);
        SubCategory::create([
            'id' => 12,
            'category_id' => 6,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/6P1MnOQflqyPuPX8enuVVYNOj14C802NP3Sm91Nv.webp',
            'name_ru' => 'Вода',
            'name_kz' => 'Су',
        ]);
        SubCategory::create([
            'id' => 13,
            'category_id' => 6,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/0ewbH1eRs3s479dAKiO9cuhPgMXNb4kYFOrwLzdP.webp',
            'name_ru' => 'Газированные напитки',
            'name_kz' => 'Газ сусы',
        ]);
        SubCategory::create([
            'id' => 14,
            'category_id' => 2,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/kPxjV6NCZFde6Zrj3fznGxsoRJVrquVRyPk9yDGD.webp',
            'name_ru' => 'Мясо',
            'name_kz' => 'Мақта',
        ]);
        SubCategory::create([
            'id' => 15,
            'category_id' => 2,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/Do9mEF0PumPxTx4utarIew8ugLhcsdiLmjk3BGxo.webp',
            'name_ru' => 'Птица',
            'name_kz' => 'Үйсініңдер',
        ]);
        SubCategory::create([
            'id' => 16,
            'category_id' => 3,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/InwzO59KUConSS2qbNpgYCtM57e9s8V7xLwmAlfh.webp',
            'name_ru' => 'Рыба',
            'name_kz' => 'Балық',
        ]);
        SubCategory::create([
            'id' => 17,
            'category_id' => 3,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/RRji9eHLXFyvovNWzTfNV51KacyqygNsICu2BkR7.webp',
            'name_ru' => 'Морепродукты',
            'name_kz' => 'Деуінділер',
        ]);
        SubCategory::create([
            'id' => 18,
            'category_id' => 5,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/fSW05YnLSGLz2CY3KlpA46c0HxoeaWeYu1CgAOHB.webp',
            'name_ru' => 'Хлеб',
            'name_kz' => 'Нан',
        ]);
        SubCategory::create([
            'id' => 19,
            'category_id' => 5,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/W7jRVXWyK3vpExd1YPC1g24LQZCN4yvlP8rd3shQ.webp',
            'name_ru' => 'Выпечка',
            'name_kz' => 'Нан өнімдері',
        ]);
        SubCategory::create([
            'id' => 20,
            'category_id' => 14,
            'image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/subcategories/PLnzTdyyikE1c3nNhnQjcFU8cqh7YyAeOkLaZ9TD.webp',
            'name_ru' => 'Хоз товары',
            'name_kz' => 'Тұрмыстық тауарлар',
        ]);
    }
}
