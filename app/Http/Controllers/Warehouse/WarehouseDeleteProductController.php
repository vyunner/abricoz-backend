<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class WarehouseDeleteProductController extends Controller
{
    public function __invoke($id)
    {
        $product = Product::findOrFail($id);

        if ($product->photo_url) {
            $path = str_replace('/storage', 'public', $product->photo_url);
            Storage::delete($path);
        }

        $product->delete();

        return $this->response(null, 'Product deleted successfully');
    }
}
