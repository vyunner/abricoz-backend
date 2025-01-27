<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @group Category
 */
class CategoryShowController extends Controller
{
    /**
     * Элемент
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        $category = Category::with('subcategories')->findOrFail($id);

        return $this->response($category, 'Категория и ее подкатегории успешно отображены!');
    }
}
