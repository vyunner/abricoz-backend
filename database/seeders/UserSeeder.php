<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'phone' => '77026207447',
            'phone_verification_code' => '123456',
            'phone_verification_code_expires_at' => Carbon::now()->addMinutes(5),
        ]);

        $user->assignRole('admin');
    }
}
