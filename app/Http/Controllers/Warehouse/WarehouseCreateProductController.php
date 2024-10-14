<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class WarehouseCreateProductController extends Controller
{
    public function __invoke(WarehouseProductRequest $request)
    {
        $data = $request->validated();

        if ($data['is_active'] == 1 && $data['amount'] <= 0) {
            return $this->response(null, 'Cannot create an active product with zero or negative amount', 400);
        }

        if ($request->hasFile('photo_url')) {
            $path = $request->file('photo_url')->store('public/products');
            $data['photo_url'] = Storage::url($path);
        }

        $product = Product::create($data);

        return $this->response($product, 'Product created successfully');
    }
}
