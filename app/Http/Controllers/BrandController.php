<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {

        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::where('brand_id', $brand_id)->get();

        // Get top 5 popular manuals by timesVisited for the brand
        $popularManuals = Manual::where('brand_id', $brand_id)
            ->orderByDesc('timesVisited')
            ->limit(5)
            ->get();

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "popularManuals" => $popularManuals
        ]);

    }
}
