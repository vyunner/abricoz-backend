<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

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

        $category = Category::create($validatedData);

        return $this->response($category, 'Категория успешно создана!');
    }
}
