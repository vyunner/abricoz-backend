<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryUpdateRequest;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;

/**
 * @group SubCategory
 */
class SubCategoryUpdateController extends Controller
{
    /**
     * Обновление
     * @param SubCategoryUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SubCategoryUpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $sub_category = SubCategory::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($sub_category->image_url && Storage::disk('s3')->exists($sub_category->image_url)) {
                Storage::disk('s3')->delete($sub_category->image_url);
            }

            $path = Storage::disk('s3')->put('subcategories', $request->file('image'), 'public');
            $data['image_url'] = Storage::disk('s3')->url($path);
            unset($data['image']);
        }

        $sub_category->fill($data)->save();

        return $this->response($sub_category, 'Данные подкатегории успешно изменены!');
    }
}
