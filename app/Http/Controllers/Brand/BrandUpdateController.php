<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

/**
 * @group Brand
 */
class BrandUpdateController extends Controller
{
    /**
     * Обновление
     * @param BrandUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(BrandUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $brand = Brand::findOrFail($id);

        $brand->fill($validatedData)->save();

        return $this->response($brand, 'Данные бренда успешно изменены!');
    }
}
