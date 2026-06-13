<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandImage;
use App\Models\Category;
use App\Models\HomeVideo;
use App\Models\Product;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'imageCount' => BrandImage::count(),
            'activeImageCount' => BrandImage::where('is_active', true)->count(),
            'videoCount' => HomeVideo::count(),
            'activeVideoCount' => HomeVideo::where('is_active', true)->count(),
            'categoryCount' => Category::count(),
            'productCount' => Product::count(),
        ]);
    }
}
