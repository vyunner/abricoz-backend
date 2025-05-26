<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryIndexRequest;
use App\Models\Category;

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
            ->orderByRaw('priority_number = 0, priority_number ASC');

        // Только если пользователь аутентифицирован и id == 3
//        if ($request->user()->id === 1) {
//            $allowedIds = [1, 2, 5]; // ← нужные ID категорий
//            $query->whereIn('id', $allowedIds);
//        }

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
