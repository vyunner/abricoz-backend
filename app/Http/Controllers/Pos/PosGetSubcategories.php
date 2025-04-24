<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;

class PosGetSubcategories extends Controller
{
    public function __invoke(Request $request)
    {
        $subcategories = Subcategory::orderBy('name_ru')->get();
        return response()->json($subcategories);
    }
}
