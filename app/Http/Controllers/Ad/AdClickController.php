<?php

namespace App\Http\Controllers\Ad;

use Illuminate\Http\Request;
use App\Models\Ad;

class AdClickController extends Controller
{
    public function __invoke(Request $request)
    {
        $adsName = $request->input('ads');

        if (!$adsName) {
            return response()->json(['success' => false, 'message' => 'Missing ads parameter'], 400);
        }

        Ad::create([
            'name' => $adsName,
        ]);

        return response()->json(['success' => true]);
    }
}
