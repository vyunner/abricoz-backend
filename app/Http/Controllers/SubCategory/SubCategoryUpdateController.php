<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryUpdateRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group SubCategory
 */
class SubCategoryUpdateController extends Controller
{
    /**
     * Обновление
     * @param SubCategoryUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SubCategoryUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $subCategory = SubCategory::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($subCategory->photo_url) {
                $oldPath = 'public' . str_replace('/storage', '', $subCategory->photo_url);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }

            $newPath = $request->file('image')->store('public/subcategories');
            unset($validatedData['image']);
            $validatedData['photo_url'] = Storage::url($newPath);
        }

        $subCategory->fill($validatedData)->save();

        return $this->response($subCategory, 'Данные подкатегории успешно изменены!');
    }
}
