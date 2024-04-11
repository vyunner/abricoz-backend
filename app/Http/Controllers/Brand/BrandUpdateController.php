<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BrandUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $brand = Brand::findOrFail($id);

        $brand->update($validatedData);

        return $this->response([], 'Данные бренда успешно изменены!');
    }
}
