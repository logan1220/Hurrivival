<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    public $timestamps  = false;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_order_quantity',
    ];
}
