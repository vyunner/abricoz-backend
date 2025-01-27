<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryStoreRequest;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;

/**
 * @group SubCategory
 */
class SubCategoryStoreController extends Controller
{
    /**
     * Создание
     * @param SubCategoryStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SubCategoryStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $path = Storage::disk('s3')->put('subcategories', $request->file('image'), 'public');
            $data['image_url'] = Storage::disk('s3')->url($path);
            unset($data['image']);
        }

        $sub_category = SubCategory::create($data);

        return $this->response($sub_category, 'Подкатегория успешно создана!');
    }
}
