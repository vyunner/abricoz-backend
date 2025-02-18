<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke(Request $request)
    {
        return now();
    }
}
