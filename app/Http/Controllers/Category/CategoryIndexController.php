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
        $query = Category::where('is_active', true)
            ->orderBy('priority_number', 'DESC');

        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $categories = $query->paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $categories->currentPage(),
                'total' => $categories->total(),
                'total_pages' => $categories->lastPage(),
                'categories' => $categories->items(),
            ], 'Список категорий успешно загружен!');
        }

        return $this->response($query->get(), 'Список категорий успешно загружен!');
    }
}
