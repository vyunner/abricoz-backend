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
        // Валидация файла
        $request->validate([
            'photo' => 'required|image|max:2048'
        ]);

        // Поиск продукта по ID
        $product = Product::findOrFail($id);

        // Если у продукта уже есть фото, удалить его
        if ($product->photo_url) {
            // Удаление файла из storage/app/public
            Storage::disk('public')->delete(str_replace('/storage/', '', $product->photo_url));
        }

        // Сохранение нового фото в папку storage/app/public/products
        $path = $request->file('photo')->store('products', 'public');

        // Формирование правильного URL для хранения в базе данных
        $photoUrl = '/storage/' . $path;

        // Обновление записи продукта с новым URL фото
        $product->update([
            'photo_url' => $photoUrl
        ]);

        return response()->json([
            'message' => 'Фото успешно загружено',
            'photo_url' => $photoUrl
        ]);
    }
}
