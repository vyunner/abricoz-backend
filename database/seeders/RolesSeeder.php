<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'warehouseman']);
        Role::create(['name' => 'courier']);
        Role::create(['name' => 'dispatcher']);
        Role::create(['name' => 'head-warehouse']);
    }
}
