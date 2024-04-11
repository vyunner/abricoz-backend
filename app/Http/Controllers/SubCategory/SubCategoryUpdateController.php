<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryUpdateRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryUpdateController extends Controller
{
    public function __invoke(SubCategoryUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $subCategory = SubCategory::findOrFail($id);

        $subCategory->update($validatedData);

        return $this->response([], 'Данные подкатегории успешно изменены!');
    }
}
