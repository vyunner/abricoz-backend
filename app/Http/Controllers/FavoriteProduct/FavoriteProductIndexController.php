<?php

namespace App\Http\Controllers\FavoriteProduct;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;

/**
 * @group FavoriteProduct
 */
class FavoriteProductIndexController extends Controller
{
    /**
     * Список
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $favoriteProduct = FavoriteProduct::paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $favoriteProduct->currentPage(),
                'favorite_products' => $favoriteProduct->items(),
                'total' => $favoriteProduct->total(),
            ], 'Список любимых продуктов успешно загружен!');
        }

        return $this->response(FavoriteProduct::all(), 'Список любимых продуктов успешно загружен!');
    }
}
