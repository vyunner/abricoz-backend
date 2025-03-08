<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

/**
 * @group App
 */
class AppGetMinCartPriceController extends Controller
{
    /**
     * Status
     * @param Request $request
     * @return false
     */
    public function __invoke(Request $request)
    {
        return 5000;
    }
}
