<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class WarehouseGetBrandsController extends Controller
{
    public function __invoke()
    {
        $brands = Brand::all();

        return $this->response($brands, 'Brands retrieved successfully');
    }
}
