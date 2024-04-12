<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

/**
 * @group Brand
 */
class BrandDestroyController extends Controller
{
    /**
     * Удаление
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return $this->response([], 'Бренд успешно удален!');
    }
}
