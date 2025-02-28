<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryIndexRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;

/**
 * @group SubCategory
 */
class SubCategoryIndexController extends Controller
{
    /**
     * Список
     * @param SubCategoryIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $query = Subcategory::where('is_active', true)
            ->orderByRaw('priority_number IS NULL, priority_number ASC');

        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $subcategories = $query->paginate($perPage, ['*'], 'page', $page);

            return response()->json([
                'current_page' => $subcategories->currentPage(),
                'total' => $subcategories->total(),
                'total_pages' => $subcategories->lastPage(),
                'subcategories' => $subcategories->items(),
            ]);
        }

        return response()->json($query->get());
    }
}
