<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

/**
 * @group Warehouse
 */
class WarehouseDeleteProductController extends Controller
{
    /**
     * Удаление продукта
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        $product = Product::findOrFail($id);

        if ($product->photo_url && Storage::disk('s3')->exists($product->photo_path)) {
            Storage::disk('s3')->delete($product->photo_path);
        }

        FavoriteProduct::where('product_id', $id)->delete();

        $product->delete();

        return $this->response(null, 'Product deleted successfully');
    }
}
