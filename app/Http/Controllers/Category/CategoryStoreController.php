<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $validatedData = $request->validated();

        if ($request->hasFile('desktop_image')) {
            $path = $request->file('desktop_image')->store('public/categories');
            unset($validatedData['desktop_image']);
            $validatedData['desktop_image_url'] = Storage::url($path);
        }

        if ($request->hasFile('mobile_image')) {
            $path = $request->file('mobile_image')->store('public/categories');
            unset($validatedData['mobile_image']);
            $validatedData['mobile_image_url'] = Storage::url($path);
        }


        $category = Category::create($validatedData);

        return $this->response($category, 'Категория успешно создана!');
    }
}
