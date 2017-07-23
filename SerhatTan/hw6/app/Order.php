<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function items()
    {
        return $this->hasMany('App\OrderItem', 'order_id');
    }
}
