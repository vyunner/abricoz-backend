<?php

namespace App\Http\Controllers\FavoriteProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteProduct\FavoriteProductIndexRequest;
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
    public function __invoke(FavoriteProductIndexRequest $request)
    {
        $user = $request->user();

        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $favoriteProduct = FavoriteProduct::where(['user_id' => $user->id])->with('product')
                ->paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $favoriteProduct->currentPage(),
                'total' => $favoriteProduct->total(),
                'favorite_products' => $favoriteProduct->items(),
            ], 'Список любимых продуктов успешно загружен!');
        }

        $favoriteProduct = FavoriteProduct::where(['user_id' => $user->id])->with('product')->get();

        return $this->response($favoriteProduct, 'Список любимых продуктов успешно загружен!');
    }
}
