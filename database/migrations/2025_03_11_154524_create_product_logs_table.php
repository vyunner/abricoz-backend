<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('stock_quantity'); // может быть положительным (приход) или отрицательным (уход)
            $table->integer('price_cost')->nullable(); // цена закупки
            $table->integer('price')->nullable(); // цена продажи
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_logs');
    }
};
