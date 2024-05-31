<?php

namespace App\Http\Controllers\ProductRating;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRating\ProductRatingStoreRequest;
use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Http\Request;

/**
 * @group ProductRating
 */
class ProductRatingShowController extends Controller
{
    /**
     * Элемент
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $user_id = $request->user()->id;
        $productRating = ProductRating::where(['product_id' => $id, 'user_id' => $user_id])->firstOrFail();

        return $this->response($productRating, 'Выставленный рейтинг пользователем успешно загружен!');
    }
}
