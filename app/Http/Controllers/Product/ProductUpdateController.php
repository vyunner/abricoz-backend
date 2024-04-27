<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

/**
 * @group Product
 */
class ProductUpdateController extends Controller
{
    /**
     * Обновление
     * @param ProductUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ProductUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();

        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/products');
            unset($validatedData['image']);
            $validatedData['photo_url'] = Storage::url($path);
        }

        $product = Product::findOrFail($id);
        $product->fill($validatedData)->save();
        $product->load(['subcategory', 'brand', 'country']);

        return $this->response($product, 'Продукт успешно изменен!');
    }
}
