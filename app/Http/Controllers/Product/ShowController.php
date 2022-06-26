<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $colors = Color::all();
        $hexs = $product->colors->all();

        $hex_code = [];
        foreach ($hexs as $hex) {
            $hex_code[] = $hex->hex_code;
        }

        // dd($hex_code);

        return view('product.show', compact('product', 'hex_code', 'colors'));
    }
}
