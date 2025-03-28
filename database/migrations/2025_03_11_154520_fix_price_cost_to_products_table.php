<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Обновим все NULL значения на 0
        DB::table('products')->whereNull('price_cost')->update(['price_cost' => 0]);

        // 2. Изменим структуру поля
        Schema::table('products', function (Blueprint $table) {
            $table->integer('price_cost')->default(0)->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('price_cost')->nullable()->default(null)->change();
        });
    }
};
