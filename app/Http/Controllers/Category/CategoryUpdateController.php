<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

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

        $category->update($validatedData);

        return $this->response([], 'Данные категории успешно изменены!');
    }
}
