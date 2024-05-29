<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group Category
 */
class CategoryUpdateController extends Controller
{
    /**
     * Обновление
     * @param CategoryUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CategoryUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($category->photo_url) {
                $oldPath = 'public' . str_replace('/storage', '', $category->photo_url);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }

            $newPath = $request->file('image')->store('public/categories');
            unset($validatedData['image']);
            $validatedData['photo_url'] = Storage::url($newPath);
        }

        if ($request->hasFile('mobile_image')) {
            if ($category->mobile_url) {
                $oldPath = 'public' . str_replace('/storage', '', $category->mobile_url);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }

            $newPath = $request->file('mobile_image')->store('public/categories');
            unset($validatedData['mobile_image']);
            $validatedData['mobile_url'] = Storage::url($newPath);
        }


        $category->fill($validatedData)->save();

        return $this->response($category, 'Данные категории успешно изменены!');
    }
}
