<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id )
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        $manual->timesVisited++;
        $manual->save();

        return view('pages.redirectPage', ['url' => $manual->originUrl]);
    }

    public function categoriesOverview(){ 
        $types = Manual::select('type')->distinct()->get();
        return view('pages.categories_overview', ['types' => $types]);
}

   public function manualsByBrandAndType($type, $brand)
{
    $brand = Brand::where('name', $brand)->firstOrFail();
    
    $manuals = Manual::where('type', $type)
        ->where('brand_id', $brand->id)
        ->get();

    return view('pages.manuals_by_brand_and_type', compact('manuals', 'brand', 'type'));
}


}
