<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->has('perPage')){
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $subCategory = SubCategory::paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $subCategory->currentPage(),
                'subCategory' => $subCategory->items(),
                'total' => $subCategory->total(),
            ], 'Список подкатегорий успешно загружен!');
        }

        return $this->response(SubCategory::all(), 'Список подкатегорий успешно загружен!');
    }
}
