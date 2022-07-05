<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(ColorProduct $colorProducts, Product $product)
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('product.index', compact('products'));
    }
}
