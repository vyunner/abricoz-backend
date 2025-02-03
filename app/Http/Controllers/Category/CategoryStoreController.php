<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

/**
 * @group Category
 */
class CategoryStoreController extends Controller
{
    /**
     * Создание
     * @param CategoryStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CategoryStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('mobile_image')) {
            $path = Storage::disk('s3')->put('mobileimages', $request->file('mobile_image'), 'public');
            $data['mobile_image_url'] = Storage::disk('s3')->url($path);
            unset($data['mobile_image']);
        }

        $category = Category::create($data);

        return $this->response($category, 'Категория успешно создана!');
    }
}
