<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcategory_id')->constrained('subcategories');
            $table->string('photo_url')->nullable();
            $table->string('where')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('name_ru');
            $table->string('name_kz');
            $table->string('name_en');
            $table->text('description_ru');
            $table->text('description_kz');
            $table->text('description_en');
            $table->string('weight');
            $table->float('calories')->nullable();
            $table->float('proteins')->nullable();
            $table->float('fats')->nullable();
            $table->float('carbohydrates')->nullable();
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('price_with_discount')->nullable();
            $table->integer('total_sales')->default(0);
            $table->integer('amount')->default(0);
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
