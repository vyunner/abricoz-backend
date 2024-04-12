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
        $favoriteProduct = FavoriteProduct::findOrFail($id);
        $favoriteProduct->delete();

        return $this->response([], 'Любимый продукт успешно удален!');
    }
}
