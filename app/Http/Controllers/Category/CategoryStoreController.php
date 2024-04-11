<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CategoryStoreRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::create($validatedData);

        return $this->response($category, 'Категория успешно создана!');
    }
}
