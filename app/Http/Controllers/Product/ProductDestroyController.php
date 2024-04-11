<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDestroyController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return $this->response([], 'Продукт успешно удален!');
    }
}
