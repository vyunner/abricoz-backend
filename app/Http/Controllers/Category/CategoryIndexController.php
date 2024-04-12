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
        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $categories = Category::paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $categories->currentPage(),
                'categories' => $categories->items(),
                'total' => $categories->total(),
            ], 'Список стран успешно загружен!');
        }

        return $this->response(Category::all(), 'Список категорий успешно загружен!');
    }
}
