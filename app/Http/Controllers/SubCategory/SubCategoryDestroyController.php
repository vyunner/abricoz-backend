<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryDestroyController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $subCategory->delete();

        return $this->response([], 'Подкатегория успешно удалена!');
    }
}
