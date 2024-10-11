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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('district_id')->constrained('districts');
            $table->foreignId('city_id')->constrained('cities');
            $table->text('address_street_and_house');
            $table->text('address_apartment');
            $table->text('address_entrance');
            $table->text('address_floor');
            $table->text('address_comment')->nullable();
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
