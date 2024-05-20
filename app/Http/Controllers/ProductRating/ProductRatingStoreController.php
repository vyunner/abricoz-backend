<?php

namespace App\Http\Controllers\ProductRating;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRating\ProductRatingStoreRequest;
use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Http\Request;

/**
 * @group ProductRating
 */
class ProductRatingStoreController extends Controller
{
    /**
     * Создание
     * @param ProductRatingStoreRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ProductRatingStoreRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user()->id;

        $productRating = ProductRating::findOrCreate([
            'product_id' => $validatedData['product_id'],
            'user_id' => $validatedData['user_id'],
        ], $validatedData);

        $productRatings = ProductRating::where('product_id', $validatedData['product_id'])->get();

        $averageRating = $productRatings->avg('rating');

        $product = Product::findOrFail($validatedData['product_id']);
        $product->rating = $averageRating;
        $product->save();

        return $this->response($productRating, 'Рейтинг успешно назначен!');
    }
}
