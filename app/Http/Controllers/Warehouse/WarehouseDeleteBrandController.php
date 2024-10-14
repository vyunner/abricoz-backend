<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class WarehouseDeleteBrandController extends Controller
{
    public function __invoke($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return $this->response(null, 'Brand deleted successfully');
    }
}
