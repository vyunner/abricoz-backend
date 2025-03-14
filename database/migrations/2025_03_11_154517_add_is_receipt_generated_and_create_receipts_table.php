<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // ✅ Добавляем колонку is_receipt_generated в orders
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('is_receipt_generated')->default(false)->after('total_price');
        });

        // ✅ Создаём таблицу receipts для хранения чеков WebKassa
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('check_number')->unique();
            $table->string('ticket_print_url');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('is_receipt_generated');
        });

        Schema::dropIfExists('receipts');
    }
};
