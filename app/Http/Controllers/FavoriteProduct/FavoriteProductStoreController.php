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
        $validatedData = $request->validated();

        $favoriteProduct = FavoriteProduct::create($validatedData);

        return $this->response($favoriteProduct, 'Любимый продукт успешно добавлен!');
    }
}
