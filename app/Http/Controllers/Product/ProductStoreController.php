<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

/**
 * @group Product
 */
class ProductStoreController extends Controller
{
    /**
     * Создание
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ProductStoreRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
            unset($validatedData['image']);
            $validatedData['photo_url'] = Storage::url($path);
        }

        if ($validatedData['discount'] > 0) {
            $validatedData['price_with_discount'] = $validatedData['price'] - $validatedData['price'] * $validatedData['discount'] / 100;
        }

        $product = Product::create($validatedData);

        $product = Product::with(['subcategory', 'brand', 'country'])->find($product->id);

        return $this->response($product, 'Продукт успешно создан!');
    }
}
