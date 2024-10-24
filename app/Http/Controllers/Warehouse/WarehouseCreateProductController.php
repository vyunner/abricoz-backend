<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseCreateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class WarehouseCreateProductController extends Controller
{
    public function __invoke(WarehouseCreateProductRequest $request)
    {
        $data = $request->validated();

        if ($data['is_active'] == 1 && $data['amount'] <= 0) {
            return $this->response(null, 'Cannot create an active product with zero or negative amount', 400);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
            $data['photo_url'] = Storage::url($path);
        }

        $product = Product::create($data);

        return $this->response($product, 'Product created successfully');
    }
}
