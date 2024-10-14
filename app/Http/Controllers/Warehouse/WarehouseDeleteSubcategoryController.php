<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;

class WarehouseDeleteSubcategoryController extends Controller
{
    public function __invoke($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        if ($subcategory->image_url) {
            $path = str_replace('/storage', 'public', $subcategory->image_url);
            Storage::delete($path);
        }

        $subcategory->delete();

        return $this->response(null, 'Subcategory deleted successfully');
    }
}
