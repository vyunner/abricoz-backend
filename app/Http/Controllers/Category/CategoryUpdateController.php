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

        if ($request->hasFile('desktop_image')) {
            if ($category->desktop_image_url) {
                $oldPath = 'public' . str_replace('/storage', '', $category->desktop_image_url);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }

            $newPath = $request->file('desktop_image')->store('public/categories');
            unset($validatedData['desktop_image']);
            $validatedData['desktop_image_url'] = Storage::url($newPath);
        }

        if ($request->hasFile('mobile_image')) {
            if ($category->mobile_image_url) {
                $oldPath = 'public' . str_replace('/storage', '', $category->mobile_image_url);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }

            $newPath = $request->file('mobile_image')->store('public/categories');
            unset($validatedData['mobile_image']);
            $validatedData['mobile_image_url'] = Storage::url($newPath);
        }


        $category->fill($validatedData)->save();

        return $this->response($category, 'Данные категории успешно изменены!');
    }
}
