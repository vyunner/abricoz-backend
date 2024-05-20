<?php

namespace App\Http\Controllers\FavoriteProduct;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;

/**
 * @group FavoriteProduct
 */
class FavoriteProductDestroyController extends Controller
{
    /**
     * Удаление
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $user_id = $request->user()->id;

        $favoriteProduct = FavoriteProduct::where('product_id', $id)
            ->where('user_id', $user_id)
            ->first();

        if (!$favoriteProduct) {
            return $this->response([], 'Избранный продукт не найден!', 404);
        }

        $favoriteProduct->delete();
        return $this->response([], 'Любимый продукт успешно удален!');
    }
}
