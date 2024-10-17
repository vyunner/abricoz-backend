<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            CitiesSeeder::class,
            UserSeeder::class,
            CategoriesSeeder::class,
            SubCategoriesSeeder::class,
            ProductsSeeder::class,
            DeliveryIntervalsSeeder::class,
            PaymentTypesSeeder::class,
            OrderSatusesSeeder::class,
            OrdersSeeder::class,
            FavoriteProductsSeeder::class,
            BannersSeeder::class,
            AddressSeeder::class,
            PointsSeeder::class,
        ]);
    }
}
