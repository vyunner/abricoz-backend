<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $subcategoriesWithDiscounts = Subcategory::whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('products')
                    ->whereRaw('products.subcategory_id = subcategories.id')
                    ->where('products.discount', '>', 0);
            })->get();

            // Добавляем "d" в id подкатегорий
            $subcategoriesWithDiscounts->transform(function ($subcategory) {
                $subcategory->id = (string) $subcategory->id . 'd';
                return $subcategory;
            });

            $category->setRelation('subcategories', $subcategoriesWithDiscounts);
        }

        return $this->response($category, 'Категория и ее подкатегории успешно отображены!');
    }
}
