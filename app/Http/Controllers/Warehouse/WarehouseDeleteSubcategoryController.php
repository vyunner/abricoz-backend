<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;

class WarehouseDeleteSubcategoryController extends Controller
{
    public function __invoke($id)
    {
        $subcategory = SubCategory::findOrFail($id);

        if ($subcategory->image_url && Storage::disk('s3')->exists($subcategory->image_url)) {
            Storage::disk('s3')->delete($subcategory->image_url);
        }

        $subcategory->delete();

        return $this->response(null, 'Subcategory deleted successfully');
    }
}
