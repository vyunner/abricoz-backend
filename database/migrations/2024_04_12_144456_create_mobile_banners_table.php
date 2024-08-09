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
        Schema::create('mobile_banners', function (Blueprint $table) {
            $table->id();
            $table->string('image_url_ru');
            $table->string('image_url_kz');
            $table->string('image_url_en');
            $table->string('title_ru')->nullable();
            $table->string('title_kz')->nullable();
            $table->string('title_en')->nullable();
            $table->integer('number')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_banners');
    }
};
