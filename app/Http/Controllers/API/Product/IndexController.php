<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('category.index', compact('categories'));
    }
}
