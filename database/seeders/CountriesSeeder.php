<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('seeders/countries.json');

        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $countries = json_decode($json, true);

            foreach ($countries as $id => $name) {
                DB::table('countries')->insert([
                    'name' => $name
                ]);
            }
        }
    }
}
