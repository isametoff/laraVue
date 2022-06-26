<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Product $product, ProductTag $productTag)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();

        $color_ids = $product->colors->all();
        $tags_ids = $product->tags->all();

        $tag_ids = [];
        foreach ($tags_ids as $tags_id) {
            $tag_ids[] = $tags_id->id;
        }

        $colors_ids = [];
        foreach ($color_ids as $colors_id) {
            $colors_ids[] = $colors_id->id;
        }
        // dd($colors_ids);
        $hex = array_unique($colors_ids);

        return view('product.edit', compact('product', 'categories', 'tags', 'colors', 'tag_ids', 'hex'));
    }
}
