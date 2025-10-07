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

    $popularManuals = Manual::where('brand_id', $brand_id)
        ->orderByDesc('timesVisited')
        ->limit(5)
        ->get();
    
    return view('pages.manual_list', [
        "brand" => $brand,
        "manuals" => $manuals,
        "popularManuals" => $popularManuals
    ]);
    }

    public function brandsByCategory($type)
{
    $brands = Brand::whereHas('manuals', function($query) use ($type) {
        $query->where('type', $type);
    })->get();
    
    return view('pages.brands_by_category', compact('brands', 'type'));
}

    
}

