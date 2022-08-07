<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\IndexProductResource;
use App\Models\Product;

class OrderController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->orderBy($data['sortItem'],$data['itemSort'])->paginate($data['perPage'], ['*'], 'page', $data['page']);

        return IndexProductResource::collection($products);
    }
}
