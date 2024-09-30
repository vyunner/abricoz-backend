<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryStoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group Warehouseman
 */
class WarehousemanIndexController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $orders = Order::whereIn('order_status_id', [1, 2])->get();

        return $this->response($orders, 'Список заказов с статусом 1 и 2');
    }
}
