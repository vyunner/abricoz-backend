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
        // Загружаем категорию с активными подкатегориями, отсортированными по `priority_number`
        $category = Category::with(['subcategories' => function ($query) {
            $query->where('is_active', true)
                ->orderByRaw('priority_number = 0, priority_number ASC');
        }])->findOrFail($id);

        if ($id === 27) {
            $subcategoriesWithDiscounts = Subcategory::where('is_active', true)
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('products')
                        ->whereRaw('products.subcategory_id = subcategories.id')
                        ->where('products.discount', '>', 0)
                        ->where('products.is_active', true); // Учитываем только активные товары
                })
                ->orderBy('priority_number', 'DESC')
                ->get();

            $subcategoriesWithDiscounts->transform(function ($subcategory) {
                $subcategory->is_discount = true;
                return $subcategory;
            });

            $category->setRelation('subcategories', $subcategoriesWithDiscounts);
        }

        return $this->response($category, 'Категория и ее подкатегории успешно отображены!');
    }
}
