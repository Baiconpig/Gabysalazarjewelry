<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function __invoke()
    {
        return view('admin.catalog.index', [
            'categories' => Category::query()
                ->withCount('products')
                ->orderBy('name')
                ->get(),
            'products' => Product::query()
                ->with('category')
                ->orderBy('name')
                ->get(),
        ]);
    }
}
