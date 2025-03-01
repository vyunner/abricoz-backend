<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
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

        if ($id === 27) {
            $subcategoriesWithDiscounts = Subcategory::select('subcategories.*')
                ->join('products', 'products.subcategory_id', '=', 'subcategories.id')
                ->whereNotNull('products.discount')
                ->distinct()
                ->get();

            $category->setRelation('subcategories', $subcategoriesWithDiscounts);
        }

        return $this->response($category, 'Категория и ее подкатегории успешно отображены!');
    }
}
