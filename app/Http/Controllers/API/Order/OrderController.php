<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        return $data;
//        $password = Str::random(10);
//        $user = User::firstOrCreate([
//                'email' => $data['email']]
//            , [
//                'name' => $data['name'],
//                'adress' => $data['adress'],
//                'password' => $data['password'],
//            ]);
//        $order = Order::create([
//                'products' => json_encode('products'),
//                'user_id' => $user->id,
//                'total_price' => $data['total_price'],
//            ]);
//
//        return new OrderResource($order);
    }
}
