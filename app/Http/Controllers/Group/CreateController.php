<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class CreateController extends Controller
{
    public function __invoke(Product $product)
    {
//        dd($product);
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();
    	return view('product.create', compact( 'product','categories', 'tags', 'colors',));
    }
}
