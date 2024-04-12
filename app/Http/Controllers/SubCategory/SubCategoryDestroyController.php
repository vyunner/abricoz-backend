<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

/**
 * @group SubCategory
 */
class SubCategoryDestroyController extends Controller
{
    /**
     * Удаление
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $subCategory->delete();

        return $this->response([], 'Подкатегория успешно удалена!');
    }
}
