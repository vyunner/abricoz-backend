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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('order_status_id')->constrained('order_statuses');
            $table->foreignId('delivery_interval_id')->constrained('delivery_intervals');
            $table->foreignId('payment_type_id')->constrained('payment_types');
            $table->foreignId('city_id')->constrained('cities');
            $table->text('address_street_and_house');
            $table->text('address_apartment');
            $table->text('address_entrance');
            $table->text('address_floor');
            $table->text('address_comment')->nullable();
            $table->date('delivery_date');
            $table->integer('products_price')->default(0);
            $table->integer('delivery_price')->default(0);
            $table->integer('total_price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
