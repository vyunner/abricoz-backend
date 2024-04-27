<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group Product
 */
class ProductDestroyController extends Controller
{
    /**
     * Удаление
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->photo_url) {
            $oldPath = 'public' . str_replace('/storage', '', $product->photo_url);
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
        }

        $product->delete();

        return $this->response([], 'Продукт успешно удален!');
    }
}
