<?php

namespace App\Http\Controllers\FavoriteProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteProduct\FavoriteProductStoreRequest;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;

class FavoriteProductStoreController extends Controller
{
    public function __invoke(FavoriteProductStoreRequest $request)
    {
        $validatedData = $request->validated();

        $favoriteProduct = FavoriteProduct::create($validatedData);

        return $this->response($favoriteProduct, 'Любимый продукт успешно добавлен!');
    }
}
