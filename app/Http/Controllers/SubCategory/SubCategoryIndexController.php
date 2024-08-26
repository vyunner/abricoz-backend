<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryIndexRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;

/**
 * @group SubCategory
 */
class SubCategoryIndexController extends Controller
{
    /**
     * Список
     * @param SubCategoryIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SubCategoryIndexRequest $request)
    {
        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $subCategory = SubCategory::paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $subCategory->currentPage(),
                'total' => $subCategory->total(),
                'total_pages' => $subCategory->lastPage(),
                'subCategory' => $subCategory->items(),
            ], 'Список подкатегорий успешно загружен!');
        }

        return $this->response(SubCategory::all(), 'Список подкатегорий успешно загружен!');
    }
}
