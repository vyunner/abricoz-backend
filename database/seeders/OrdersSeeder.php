<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'user_id' => 1,
            'order_status_id' => 1,
            'delivery_interval_id' => 5,
            'payment_type_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
            'address' => 'ул. Гоголя, 15, Алматы, Казахстан',
            'address_comment' => 'Код от домофона 2580, второй подъезд, на третьем этаже.',
            'order_comment' => 'Пожалуйста, выберите продукты без глютена. Спасибо!',
            'delivery_date' => Carbon::now(),
        ]);
        Order::create([
            'user_id' => 1,
            'order_status_id' => 2,
            'delivery_interval_id' => 8,
            'payment_type_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
            'address' => 'проспект Назарбаева, 88, Алматы, Казахстан',
            'address_comment' => 'Дом за магазином “Жибек Жолы”, парковка сзади. Позвоните, когда приедете.',
            'order_comment' => 'Не заменяйте товары без согласования. Если нет яблок Голден, оставьте позицию пустой.',
            'delivery_date' => Carbon::now(),
        ]);
        Order::create([
            'user_id' => 1,
            'order_status_id' => 3,
            'delivery_interval_id' => 10,
            'payment_type_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
            'address' => 'ул. Толе би, 59, Алматы, Казахстан',
            'address_comment' => 'Белый забор, третий дом от угла. Собака во дворе не кусается.',
            'order_comment' => 'Доставить до 18:00, пожалуйста. Очень важно!',
            'delivery_date' => Carbon::now(),
        ]);
        Order::create([
            'user_id' => 1,
            'order_status_id' => 4,
            'delivery_interval_id' => 14,
            'payment_type_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
            'address' => 'пер. Макатаева, 123, Алматы, Казахстан',
            'address_comment' => 'Подъезд с кодовым замком, код 3344. Звоните на мобильный при прибытии.',
            'order_comment' => 'Если найдете экзотические фрукты, добавьте пару штук к заказу. Сюрприз!',
            'delivery_date' => Carbon::now(),
        ]);
        Order::create([
            'user_id' => 1,
            'order_status_id' => 1,
            'delivery_interval_id' => 20,
            'payment_type_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
            'address' => 'пр. Сейфуллина, 501, Алматы, Казахстан',
            'address_comment' => 'Офисный центр "Глобус", вход со стороны улицы. Охранник проводит.',
            'order_comment' => 'Пожалуйста, упакуйте хрупкие продукты отдельно и пометьте соответствующим образом.',
            'delivery_date' => Carbon::now(),
        ]);

        $orders = Order::all();

        foreach ($orders as $order) {
            $productsPrice = 0;
            for ($i = 0; $i < 5; $i++) {
                $product_price = rand(1, 15);
                $product_quantity = rand(1, 15);

                DB::table('order_products')->insert([
                    'order_id' => $order->id,
                    'product_id' => rand(1, 5),
                    'product_quantity' => $product_quantity,
                    'product_price' => $product_price,
                    'product_discount' => rand(0, 1),
                ]);

                $productsPrice += $product_price * $product_quantity;
                $deliveryPrice = District::where(['id' => $order->district_id]);
                $deliveryPrice = $deliveryPrice->delivery_price;

                if ($i == 4) {
                    $order->update(['products_price' => $productsPrice]);
                    $order->update(['delivery_price' => $deliveryPrice]);
                    $order->update(['total_price' => $productsPrice + $deliveryPrice]);
                }
            }
        }
    }
}
