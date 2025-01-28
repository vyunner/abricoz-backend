<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

/**
 * @group Category
 */
class CategoryUpdateController extends Controller
{
    /**
     * Обновление
     * @param CategoryUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CategoryUpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);

        if ($request->hasFile('desktop_image')) {
            if ($category->desktop_image_url && Storage::disk('s3')->exists($category->desktop_image_apth)) {
                Storage::disk('s3')->delete($category->desktop_image_apth);
            }

            $path = Storage::disk('s3')->put('desktopimages', $request->file('desktop_image'), 'public');
            $data['desktop_image_url'] = Storage::disk('s3')->url($path);
            unset($data['desktop_image']);
        }

        if ($request->hasFile('mobile_image')) {
            if ($category->mobile_image_url && Storage::disk('s3')->exists($category->mobile_image_path)) {
                Storage::disk('s3')->delete($category->mobile_image_path);
            }

            $path = Storage::disk('s3')->put('mobileimages', $request->file('mobile_image'), 'public');
            $data['mobile_image_url'] = Storage::disk('s3')->url($path);
            unset($data['mobile_image']);
        }

        $category->fill($data)->save();

        return $this->response($category, 'Данные категории успешно изменены!');
    }
}
