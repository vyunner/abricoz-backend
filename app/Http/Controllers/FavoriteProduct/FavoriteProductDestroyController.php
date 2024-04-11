<?php

namespace App\Http\Controllers\FavoriteProduct;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;

class FavoriteProductDestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $favoriteProduct = FavoriteProduct::findOrFail($id);
        $favoriteProduct->delete();

        return $this->response([], 'Любимый продукт успешно удален!');
    }
}
