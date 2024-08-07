<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

/**
 * @group SubCategory
 */
class SubCategoryShowController extends Controller
{
    /**
     * Элемент
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);

        return $this->response($subcategory, 'Подкатегория успешно отображена!');
    }
}
