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

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
            $data['photo_url'] = Storage::url($path);
        }

        unset($data['image']);

        $product = Product::create($data);

        return $this->response($product, 'Product created successfully');
    }
}
