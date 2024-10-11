<?php

namespace Database\Seeders;

use App\Models\Order;
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
        $ordersData = [
            [
                'user_id' => 1,
                'order_status_id' => 1,
                'delivery_interval_id' => 1,
                'payment_type_id' => 1,
                'city_id' => 1,
                'address_street_and_house' => 'ул. Гоголя, 15',
                'address_apartment' => '5',
                'address_entrance' => '2',
                'address_floor' => '3',
                'address_comment' => 'Код от домофона 2580, второй подъезд, на третьем этаже.',
                'delivery_date' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'order_status_id' => 2,
                'delivery_interval_id' => 2,
                'payment_type_id' => 1,
                'city_id' => 1,
                'address_street_and_house' => 'проспект Назарбаева, 88',
                'address_apartment' => '12',
                'address_entrance' => '1',
                'address_floor' => '2',
                'address_comment' => 'Дом за магазином “Жибек Жолы”, парковка сзади. Позвоните, когда приедете.',
                'delivery_date' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'order_status_id' => 3,
                'delivery_interval_id' => 3,
                'payment_type_id' => 1,
                'city_id' => 1,
                'address_street_and_house' => 'ул. Толе би, 59',
                'address_apartment' => '3',
                'address_entrance' => '1',
                'address_floor' => '1',
                'address_comment' => 'Белый забор, третий дом от угла. Собака во дворе не кусается.',
                'delivery_date' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'order_status_id' => 4,
                'delivery_interval_id' => 4,
                'payment_type_id' => 1,
                'city_id' => 1,
                'address_street_and_house' => 'пер. Макатаева, 123',
                'address_apartment' => '14',
                'address_entrance' => '3',
                'address_floor' => '5',
                'address_comment' => 'Подъезд с кодовым замком, код 3344. Звоните на мобильный при прибытии.',
                'delivery_date' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'order_status_id' => 1,
                'delivery_interval_id' => 3,
                'payment_type_id' => 1,
                'city_id' => 1,
                'address_street_and_house' => 'пр. Сейфуллина, 501',
                'address_apartment' => '22',
                'address_entrance' => '4',
                'address_floor' => '7',
                'address_comment' => 'Офисный центр "Глобус", вход со стороны улицы. Охранник проводит.',
                'delivery_date' => Carbon::now(),
            ],
        ];

        foreach ($ordersData as $orderData) {
            $order = Order::create($orderData);

            $productsPrice = 0;

            for ($i = 0; $i < 5; $i++) {
                $product_price = rand(1, 15);
                $product_quantity = rand(1, 15);
                $product_discount = rand(0, 1);
                $priceWithDiscount = $product_price * ((100 - $product_discount) / 100);

                DB::table('order_products')->insert([
                    'order_id' => $order->id,
                    'product_id' => rand(1, 5),
                    'product_quantity' => $product_quantity,
                    'product_price' => $product_price,
                    'product_discount' => $product_discount,
                    'product_price_with_discount' => $priceWithDiscount,
                ]);

                $productsPrice += $priceWithDiscount * $product_quantity;
            }

            $order->update([
                'products_price' => $productsPrice,
                'total_price' => $productsPrice,
            ]);
        }
    }
}
