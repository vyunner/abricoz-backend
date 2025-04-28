<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->string('product_weight')
                ->default('')
                ->nullable(false)
                ->after('product_id');

            $table->integer('product_price_cost')
                ->default(0)
                ->nullable(false)
                ->after('product_price_with_discount');
        });
    }

    public function down(): void
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropColumn('product_weight');
            $table->dropColumn('product_price_cost');
        });
    }
};
