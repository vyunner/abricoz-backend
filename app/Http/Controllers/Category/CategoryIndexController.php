<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryIndexRequest;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @group Category
 */
class CategoryIndexController extends Controller
{
    /**
     * Список
     * @param CategoryIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CategoryIndexRequest $request)
    {
        $excludedIds = [21, 22, 23, 24, 13, 19, 8]; // ID категорий, которые нужно исключить

        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $categories = Category::whereNotIn('id', $excludedIds)
                ->paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $categories->currentPage(),
                'total' => $categories->total(),
                'total_pages' => $categories->lastPage(),
                'categories' => $categories->items(),
            ], 'Список категорий успешно загружен!');
        }

        $categories = Category::whereNotIn('id', $excludedIds)->get();

        return $this->response($categories, 'Список категорий успешно загружен!');
    }
}
