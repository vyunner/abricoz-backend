<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\AddProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

/**
 * @group Warehouse
 */
class WarehouseAddPhotoProductController extends Controller
{
    /**
     * Добавление фото товара
     *
     * @param AddProductRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AddProductRequest $request, int $id)
    {
        $request->validated();

        $product = Product::findOrFail($id);

        if ($product->photo_url && Storage::disk('s3')->exists($product->photo_path)) {
            Storage::disk('s3')->delete($product->photo_path);
        }

        $path = Storage::disk('s3')->put('products', $request->file('photo'), 'public');
        $photo_url = Storage::disk('s3')->url($path);

        $product->update(['photo_url' => $photo_url]);

        return response()->json([
            'message' => 'Фото успешно загружено',
            'photo_url' => $photo_url,
        ]);
    }
}
