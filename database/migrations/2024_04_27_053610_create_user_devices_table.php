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
        Schema::create('user_devices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fcm_token_type_id')->nullable(); // Должно быть nullable
            $table->unsignedBigInteger('user_id')->nullable(); // Должно быть nullable
            $table->string('fcm_token');
            $table->string('device_id');
            $table->timestamps();

            // Внешние ключи
            $table->foreign('fcm_token_type_id')
                ->references('id')
                ->on('fcm_token_types')
                ->onDelete('set null');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_devices');
    }
};
