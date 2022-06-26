<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(Product $product)
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $count = Product::all()->count();
        $productCount = round($count / (60) * 100);

        return view('main.index', compact('data', 'productCount'));
    }
}
