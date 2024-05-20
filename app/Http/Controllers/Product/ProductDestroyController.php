<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\QueryException;
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

        try {
            $product->delete();

            if ($product->photo_url) {
                $oldPath = 'public' . str_replace('/storage', '', $product->photo_url);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return $this->response([], 'Невозможно удалить продукт, так как он используется в других записях.', 409);
            }
            return $this->response([], 'Произошла ошибка при удалении продукта', 500);
        }

        return $this->response([], 'Продукт успешно удален!');
    }
}
