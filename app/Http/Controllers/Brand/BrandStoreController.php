<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandStoreRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

/**
 * @group Brand
 */
class BrandStoreController extends Controller
{
    /**
     * Создание
     * @param BrandStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(BrandStoreRequest $request)
    {
        $validatedData = $request->validated();

        $brand = Brand::create($validatedData);

        return $this->response(['brand' => $brand], 'Бренд успешно создан!');
    }
}
