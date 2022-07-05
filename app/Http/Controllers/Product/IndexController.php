<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\ColorProduct;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(ColorProduct $colorProducts, FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->orderBy('created_at','desc')->paginate(1);
//        $query = Product::query();
//
//        if (isset($data['category_id'])) {
//            $query->where('category_id', $data['category_id']);
//        }
//        if (isset($data['title'])) {
//            $query->where('title', 'like', "%{$data['title']}%");
//        }
//        if (isset($data['description'])) {
//            $query->where('description', 'like', "%{$data['description']}%");
//        }
//        if (isset($data['content'])) {
//            $query->where('content', 'like', "%{$data['content']}%");
//        }
//
//        $products = $query->get();
//        dd($products);

//        $products = Product::orderBy('id', 'desc')->get();
        return view('product.index', compact('products'));
    }
}
