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
        // Загружаем категорию с подкатегориями, отсортированными по `priority_number`
        $category = Category::with(['subcategories' => function ($query) {
            $query->orderByRaw('priority_number IS NULL, priority_number ASC'); // NULL в конец
        }])->findOrFail($id);

        if ($id === 27) {
            $subcategoriesWithDiscounts = Subcategory::whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('products')
                    ->whereRaw('products.subcategory_id = subcategories.id')
                    ->where('products.discount', '>', 0);
            })->orderByRaw('priority_number IS NULL, priority_number ASC') // Сортировка
            ->get();

            // Добавляем `is_discount: true` только к нужным подкатегориям
            $subcategoriesWithDiscounts->transform(function ($subcategory) {
                $subcategory->is_discount = true;
                return $subcategory;
            });

            $category->setRelation('subcategories', $subcategoriesWithDiscounts);
        }

        return $this->response($category, 'Категория и ее подкатегории успешно отображены!');
    }
}
