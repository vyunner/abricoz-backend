<?php

namespace App\Http\Controllers\UserCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryIndexRequest;
use App\Models\SubCategory;
use App\Models\UserCard;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
 * @group SubCategory
 */
class UserCardIndexController extends Controller
{
    /**
     * Список
     * @param SubCategoryIndexRequest $request
     * @return array
     */
    public function __invoke(Request $request)
    {

        return ['carbon' => Carbon::now(), UserCard::all()];
    }
}
