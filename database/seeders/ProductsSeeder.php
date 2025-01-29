<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'subcategory_id' => 4,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Грибы Эноки',
            'name_kz'        => 'Эноки саңырауқұлақтары',
            'description_ru' => 'Эноки — это нежные грибы с тонкими белыми ножками и небольшими шляпками, обладающие лёгким сладковатым вкусом и мягкой текстурой. Отлично подходят для супов, салатов и горячих блюд.',
            'description_kz' => 'Эноки саңырауқұлақтары — жұқа, ақ түсті сабағы және кішкентай қалпақшалары бар нәзік саңырауқұлақтар. Олар сорпаға, салатқа және әртүрлі ыстық тағамдарға жақсы үйлеседі.',
            'price'          => 380,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/dJ0cIegkzZDI1tUhntOWOTJSOwGkQ0QCMxQGFiIE.webp',
            'weight'         => '350 г',
            'calories'       => 37,
            'proteins'       => 2.7,
            'fats'           => 0.2,
            'carbohydrates'  => 7.8,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Айсберг',
            'name_kz'        => 'Айсберг салаты',
            'description_ru' => 'Айсберг — это хрустящий салат с сочными зелёными листьями, отлично подходит для приготовления свежих салатов и бутербродов.',
            'description_kz' => 'Айсберг салаты — қытырлақ, шырынды жапырақтары бар салат, балғын салаттар мен бутербродтарға өте қолайлы.',
            'price'          => 400,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/4Lyd0FvXfh8jZyAag9uymeC8kPHFL9aVPETnaGYY.webp',
            'weight'         => '130 г',
            'calories'       => 14,
            'proteins'       => 0.9,
            'fats'           => 0.1,
            'carbohydrates'  => 3,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Ассорти',
            'name_kz'        => 'Аралас көк',
            'description_ru' => 'Ассорти из свежей зелени включает разные виды салатов и трав, наполняя блюда витаминами и ароматом.',
            'description_kz' => 'Аралас көк — түрлі салаттар мен шөптердің қоспасы, тағамдарға дәрумендер мен хош иіс береді.',
            'price'          => 500,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/MjwXgFmrQdAaU8fIlkYdCL3FBQLZlw3GLvqpRbYJ.webp',
            'weight'         => '130 г',
            'calories'       => 23,
            'proteins'       => 2.0,
            'fats'           => 0.3,
            'carbohydrates'  => 3.5,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Базилик',
            'name_kz'        => 'Базилик',
            'description_ru' => 'Базилик — ароматная зелень с ярким пряным вкусом, часто используется в соусах, салатах и итальянской кухне.',
            'description_kz' => 'Базилик — ерекше хош иісі бар көк, оны тұздықтарда, салаттарда және италиялық тағамдарда жиі қолданады.',
            'price'          => 500,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/oHPOUEoZs3i9yWsB00jq5EjEwWvm8sz9B2TJXhbK.webp',
            'weight'         => '130 г',
            'calories'       => 22,
            'proteins'       => 3.2,
            'fats'           => 0.6,
            'carbohydrates'  => 2.7,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Кинза',
            'name_kz'        => 'Кинза (кориандр)',
            'description_ru' => 'Кинза (кориандр) — пряная зелень с ярким ароматом, придаёт особый вкус блюдам и широко используется в восточной кухне.',
            'description_kz' => 'Кинза (кориандр) — хош иісті көк, тағамдарға ерекше дәм беріп, шығыс асханасында жиі қолданылады.',
            'price'          => 400,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/qmEAxIH1MBeHvKCk5s9IqcgY514j5gxaFLgdSTfo.webp',
            'weight'         => '130 г',
            'calories'       => 23,
            'proteins'       => 2.1,
            'fats'           => 0.5,
            'carbohydrates'  => 3.6,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Лола Роса',
            'name_kz'        => 'Лолло росса салаты',
            'description_ru' => 'Лола Роса — сорт салата с ярко-красными волнистыми листьями и мягким вкусом. Идеально для свежих салатов.',
            'description_kz' => 'Лолло росса салаты — қызыл толқынды жапырақтары бар салат, нәзік дәмі бар және салаттарда өте қолайлы.',
            'price'          => 500,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/DsAdrChhlthZ2kMnDfqMZhTbMG6Vn6eVa47klLag.webp',
            'weight'         => '130 г',
            'calories'       => 16,
            'proteins'       => 1.3,
            'fats'           => 0.2,
            'carbohydrates'  => 3.0,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень лук зеленый',
            'name_kz'        => 'Жасыл пияз',
            'description_ru' => 'Зелёный лук — молодые побеги репчатого лука, отличается мягким вкусом. Часто используется для украшения и добавления свежести блюдам.',
            'description_kz' => 'Жасыл пияз — басты пияздың жас өскіндері, жұмсақ дәмі бар. Тағамдарды әрлеу және оларға балғындық беру үшін қолданылады.',
            'price'          => 450,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/gztjzzUGjWH1OjRiWa965pohLVA5AEpIVLDdlNf2.webp',
            'weight'         => '130 г',
            'calories'       => 32,
            'proteins'       => 1.8,
            'fats'           => 0.2,
            'carbohydrates'  => 7.3,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Мята',
            'name_kz'        => 'Жалбыз',
            'description_ru' => 'Мята — освежающая зелень с ярким ментоловым ароматом, часто используется в напитках, десертах и соусах.',
            'description_kz' => 'Жалбыз — сергітетін хош иісі бар көк, сусындарда, десерттерде және тұздықтарда жиі қолданылады.',
            'price'          => 500,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/GkGOdiam9zO2Q7yWAjzx1Sa780hrIC3qGRRvGQOs.webp',
            'weight'         => '130 г',
            'calories'       => 44,
            'proteins'       => 3.3,
            'fats'           => 0.7,
            'carbohydrates'  => 8.4,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Петрушка',
            'name_kz'        => 'Ақжелкен',
            'description_ru' => 'Петрушка — универсальная зелень с насыщенным ароматом, богата витаминами и минералами. Хорошо подходит к салатам, супам и соусам.',
            'description_kz' => 'Ақжелкен — хош иісті, дәрумендер мен минералдарға бай көк. Салаттарда, сорпаларда және тұздықтарда жиі қолданылады.',
            'price'          => 380,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/CnU32XW0kjlC9wBUfCydPiY8VtCG25utFxfOl2FN.webp',
            'weight'         => '130 г',
            'calories'       => 36,
            'proteins'       => 3.0,
            'fats'           => 0.8,
            'carbohydrates'  => 6.3,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Петрушка кудрявая',
            'name_kz'        => 'Бұйра ақжелкен',
            'description_ru' => 'Кудрявая петрушка отличается декоративными листьями и ярким ароматом. Часто используется для украшения блюд.',
            'description_kz' => 'Бұйра ақжелкен әдемі бұйра жапырақтары және хош иісімен ерекшеленеді, көбіне тағамдарды безендіру үшін қолданылады.',
            'price'          => 500,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/lSe7nMi1Pf5tP9Z3d1m8XudehY8s6cGVcEBc3Cft.webp',
            'weight'         => '130 г',
            'calories'       => 36,
            'proteins'       => 3.0,
            'fats'           => 0.8,
            'carbohydrates'  => 6.3,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень салат микс',
            'name_kz'        => 'Салат миксі',
            'description_ru' => 'Салат Микс — это сочетание разных видов салатов и пряных трав, добавляющее разнообразие во вкус и внешний вид блюд.',
            'description_kz' => 'Салат миксі — түрлі салаттар мен хош иісті шөптердің қосындысы, тағамның дәмі мен көрінісін әрлейді.',
            'price'          => 700,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/preGeb2AYcEYKwndBXY8KlCve8eoEg1q4qPVduWU.webp',
            'weight'         => '130 г',
            'calories'       => 25,
            'proteins'       => 1.8,
            'fats'           => 0.3,
            'carbohydrates'  => 4.0,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Рукола',
            'name_kz'        => 'Руккола',
            'description_ru' => 'Рукола — салат с пикантным, слегка горьковатым вкусом и ореховым ароматом. Часто используется в итальянской кухне.',
            'description_kz' => 'Руккола — ащылау, жаңғақ хош иісі бар салат, италиялық тағамдарда жиі қолданылады.',
            'price'          => 700,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/RVCbnx18ZbwZXy0p9tpyMSW1NSb5mFSoDeJhgoE8.webp',
            'weight'         => '130 г',
            'calories'       => 25,
            'proteins'       => 2.6,
            'fats'           => 0.7,
            'carbohydrates'  => 3.7,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень салатный лист',
            'name_kz'        => 'Жапырақты салат',
            'description_ru' => 'Салатный лист — это нежные зелёные листья, идеально подходящие для приготовления свежих салатов и украшения блюд.',
            'description_kz' => 'Жапырақты салат — жұмсақ жасыл жапырақтары бар, балғын салаттар жасауға және тағамды әсемдеуге ыңғайлы.',
            'price'          => 550,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/MWBExDYjZDYrGnxDgS4UOJ9AhzaKAc7Vp9HU1McH.webp',
            'weight'         => '130 г',
            'calories'       => 15,
            'proteins'       => 1.4,
            'fats'           => 0.2,
            'carbohydrates'  => 2.9,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень листья Сельдерея',
            'name_kz'        => 'Сельдерей жапырақтары',
            'description_ru' => 'Листья сельдерея — ароматная зелень с лёгкой горчинкой, богата витаминами. Хорошо сочетается с овощными блюдами и супами.',
            'description_kz' => 'Сельдерей жапырақтары — хош иісті көк, аздап ащылау дәмі бар, көкөніс тағамдары мен сорпаларға сай келеді.',
            'price'          => 250,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/NKGe1LVycqmoDfL8nITKRTMcNHa2ttL8pXcVLQO3.webp',
            'weight'         => '130 г',
            'calories'       => 12,
            'proteins'       => 0.7,
            'fats'           => 0.2,
            'carbohydrates'  => 2.2,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень стебель Сельдерея',
            'name_kz'        => 'Сельдерей сабағы',
            'description_ru' => 'Стебли сельдерея — это хрустящие побеги с освежающим ароматом, часто используются в салатах, смузи и для перекусов.',
            'description_kz' => 'Сельдерей сабағы — қытырлақ, балғын хош иісі бар, салаттарда, смузилерде және жеңіл тамақтарда пайдаланады.',
            'price'          => 780,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/GzR1CnQP6lmMJJzWJSQDirMPzDY70QzT80XKpKoY.webp',
            'weight'         => '130 г',
            'calories'       => 14,
            'proteins'       => 0.7,
            'fats'           => 0.1,
            'carbohydrates'  => 3.0,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Укроп',
            'name_kz'        => 'Аскөк',
            'description_ru' => 'Укроп — это ароматная зелень с освежающим вкусом, часто используется для солений, соусов и рыбных блюд.',
            'description_kz' => 'Аскөк — хош иісті көк, тұздалған тағамдарда, тұздықтарда және балық тағамдарында кең қолданылады.',
            'price'          => 450,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/8hsMuzLLYtRFAH5um2mMupferjeQF0DXKWyewoOq.webp',
            'weight'         => '130 г',
            'calories'       => 43,
            'proteins'       => 3.5,
            'fats'           => 1.1,
            'carbohydrates'  => 7.0,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Шпинат',
            'name_kz'        => 'Шпинат',
            'description_ru' => 'Шпинат — листовая зелень с мягким вкусом и богатым содержанием витаминов и минералов. Идеален для салатов, супов и горячих блюд.',
            'description_kz' => 'Шпинат — нәзік дәмі бар жапырақты көк, дәрумендер мен минералдарға бай. Салаттарда, сорпаларда және ыстық тағамдарда қолданылады.',
            'price'          => 500,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/T70JdIorZc79gCfb6nnkpSSfYS7Vb8YZw5RLAGWl.webp',
            'weight'         => '130 г',
            'calories'       => 23,
            'proteins'       => 2.9,
            'fats'           => 0.4,
            'carbohydrates'  => 3.6,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 3,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Зелень Щавель',
            'name_kz'        => 'Қымыздық',
            'description_ru' => 'Щавель — кислая зелень с освежающим вкусом, широко используется в супах (зелёный борщ), салатах и соусах.',
            'description_kz' => 'Қымыздық — қышқыл, сергітетін дәмі бар көк, көк сорпада, салаттарда және тұздықтарда жиі қолданылады.',
            'price'          => 350,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/WymdfxrcUdmzLmfDRJrbAWBi1GdNM0wl5CuHEphs.webp',
            'weight'         => '130 г',
            'calories'       => 22,
            'proteins'       => 2.0,
            'fats'           => 0.3,
            'carbohydrates'  => 3.2,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 2,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Капуста цветная',
            'name_kz'        => 'Түсті қырыққабат',
            'description_ru' => 'Цветная капуста — нежные соцветия с мягким вкусом, отлично подходит для запекания, жарки и приготовления в кляре.',
            'description_kz' => 'Түсті қырыққабат — жұмсақ дәмі бар гүлшоғырлар, оны қуыруға, пісіруге және клярда дайындауға болады.',
            'price'          => 1300,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/1RmwohqlzaFIdGfWrVN5hTgDjYNFPdDrDfc0uzMH.webp',
            'weight'         => '1 кг',
            'calories'       => 25,
            'proteins'       => 1.9,
            'fats'           => 0.3,
            'carbohydrates'  => 5.0,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 2,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Редиска',
            'name_kz'        => 'Шомыр',
            'description_ru' => 'Редиска — это хрустящий корнеплод с острым, слегка горьковатым вкусом, часто используется в салатах.',
            'description_kz' => 'Шомыр — ащылау дәмі бар қытырлақ тамыржеміс, салаттарға жиі қосылады.',
            'price'          => 400,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/FqPQcImuwJ4EKRzQmCaXIFGCiFvcXrPKG1gzIA6Z.webp',
            'weight'         => '1 пучок',
            'calories'       => 16,
            'proteins'       => 0.7,
            'fats'           => 0.1,
            'carbohydrates'  => 3.4,
            'is_active'      => 1,
        ]);

        Product::create([
            'subcategory_id' => 2,
            'manufacturer'   => 'ТОО "Abricoz", Казахстан',
            'name_ru'        => 'Овощи черри',
            'name_kz'        => 'Шие қызанақтар',
            'description_ru' => 'Томаты черри — маленькие сладкие помидоры, идеально подходят для салатов, закусок и украшения блюд.',
            'description_kz' => 'Шие қызанақтар — кішкентай тәтті қызанақтар, салаттарда, тіскебасарларда және тағамдарды сәндеуге таптырмас.',
            'price'          => 700,
            'discount'       => 0,
            'photo_url'      => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/products/FtrgF4N6xB6mAv7QJF0seIVSr6tPrsj20vCbemGR.webp',
            'weight'         => '450 г',
            'calories'       => 18,
            'proteins'       => 0.9,
            'fats'           => 0.2,
            'carbohydrates'  => 3.6,
            'is_active'      => 1,
        ]);

        $products = Product::all();
        foreach ($products as $product) {
            $discountedPrice = $product->price - ($product->price * $product->discount / 100);
            $product->price_with_discount = $discountedPrice;
            $product->save();
        }
    }
}
