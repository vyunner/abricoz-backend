<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryStoreRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;

/**
 * @group SubCategory
 */
class SubCategoryStoreController extends Controller
{
    /**
     * Создание
     * @param SubCategoryStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SubCategoryStoreRequest $request)
    {
        $validatedData = $request->validated();

        $subCategory = SubCategory::create($validatedData);

        return $this->response($subCategory, 'Подкатегория успешно создана!');
    }
}
