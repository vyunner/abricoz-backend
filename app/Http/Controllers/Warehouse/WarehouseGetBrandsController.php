<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class WarehouseGetBrandsController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Brand::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $brands = $query->get();

        return $this->response($brands, 'Бренды успешно получены');
    }
}
