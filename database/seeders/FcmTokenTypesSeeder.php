<?php

namespace Database\Seeders;

use App\Models\FcmTokenType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FcmTokenTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FcmTokenType::create(['name' => 'abricoz']);
        FcmTokenType::create(['name' => 'staff_abricoz']);
    }
}
