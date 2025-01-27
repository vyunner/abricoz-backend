<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class WarehouseDeleteProductController extends Controller
{
    public function __invoke($id)
    {
        $product = Product::findOrFail($id);

        if ($product->photo_url && Storage::disk('s3')->exists($product->photo_url)) {
            Storage::disk('s3')->delete($product->photo_url);
        }

        FavoriteProduct::where('product_id', $id)->delete();

        $product->delete();

        return $this->response(null, 'Product deleted successfully');
    }
}
