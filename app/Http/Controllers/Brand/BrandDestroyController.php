<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandDestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return $this->response([], 'Бренд успешно удален!');
    }
}
