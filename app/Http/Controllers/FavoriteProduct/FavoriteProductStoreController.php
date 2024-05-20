<?php

namespace App\Http\Controllers\FavoriteProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteProduct\FavoriteProductStoreRequest;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;

/**
 * @group FavoriteProduct
 */
class FavoriteProductStoreController extends Controller
{
    /**
     * Создание
     * @param FavoriteProductStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(FavoriteProductStoreRequest $request)
    {
        $user_id = $request->user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $user_id;

        $favoriteProduct = FavoriteProduct::create($validatedData)->load('product');

        return $this->response($favoriteProduct, 'Любимый продукт успешно добавлен!');
    }
}
