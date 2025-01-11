<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Http\Requests\Warehouse\WarehouseCreateSubcategoryRequest;
use Illuminate\Support\Facades\Storage;

class WarehouseCreateSubcategoryController extends Controller
{
    public function __invoke(WarehouseCreateSubcategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('public/subcategories');
            $data['image_url'] = Storage::url($path);
        }

        $subcategory = SubCategory::create($data);

        return $this->response($subcategory, 'Subcategory created successfully');
    }
}
