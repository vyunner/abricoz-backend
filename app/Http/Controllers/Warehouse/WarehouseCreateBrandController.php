<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\Warehouse\WarehouseCreateBrandRequest;

class WarehouseCreateBrandController extends Controller
{
    public function __invoke(WarehouseCreateBrandRequest $request)
    {
        $brand = Brand::create($request->validated());

        return $this->response($brand, 'Brand created successfully');
    }
}
