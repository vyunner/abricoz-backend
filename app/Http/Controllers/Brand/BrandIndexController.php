<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandIndexRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

/**
 * @group Brand
 */
class BrandIndexController extends Controller
{
    /**
     * Список
     * @param BrandIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(BrandIndexRequest $request)
    {
        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $brands = Brand::paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $brands->currentPage(),
                'total' => $brands->total(),
                'brands' => $brands->items(),
            ], 'Список брендов успешно загружен!');
        }

        return $this->response(Brand::all(), 'Список брендов успешно загружен!');
    }
}
