<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $quarded = false;

    protected $fillable = [
        'id' ,
        'user_id' ,
        'total_price' ,
        'payment_status'
    ];
}
