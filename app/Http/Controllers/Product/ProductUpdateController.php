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

        $product = Product::findOrFail($id);

        if($request->hasFile('image')){
            if($product->photo_url){
                $oldPath = 'public' . str_replace('/storage', '', $product->photo_url);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }

            $newPath = $request->file('image')->store('public/products');
            unset($validatedData['image']);
            $validatedData['photo_url'] = Storage::url($newPath);
        }

        $product->fill($validatedData)->save();
        $product->load(['subcategory', 'brand', 'country']);

        return $this->response($product, 'Продукт успешно изменен!');
    }
}
