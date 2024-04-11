<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryDestroyController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return $this->response([], 'Категория успешно удалена!');
    }
}
