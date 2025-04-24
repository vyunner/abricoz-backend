<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class PosGetSubcategories extends Controller
{
    public function __invoke(Request $request)
    {
        $subcategories = SubCategory::orderBy('name_ru')->get();
        return response()->json($subcategories);
    }
}
