<?php

namespace App\Http\Controllers\ProductRating;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRating\ProductRatingUpdateRequest;
use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Http\Request;

/**
 * @group ProductRating
 */
class ProductRatingUpdateController extends Controller
{
    /**
     * Изменение
     * @param ProductRatingUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ProductRatingUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $productRating = ProductRating::findOrFail($id);

        $productRating->fill($validatedData)->save();

        $productRatings = ProductRating::where('product_id', $validatedData['product_id'])->get();

        $averageRating = $productRatings->avg('rating');

        $product = Product::findOrFail($validatedData['product_id']);
        $product->rating = $averageRating;
        $product->save();

        return $this->response($productRating, 'Рейтинг продукта успешно изменен!');
    }
}
