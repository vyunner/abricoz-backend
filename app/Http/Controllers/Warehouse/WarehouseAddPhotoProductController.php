<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class WarehouseAddPhotoProductController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $request->validate(['photo' => 'required|image|max:2048']);

        $product = Product::findOrFail($id);

        if ($product->photo_url && Storage::disk('s3')->exists($product->photo_url)) {
            Storage::disk('s3')->delete($product->photo_url);
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
