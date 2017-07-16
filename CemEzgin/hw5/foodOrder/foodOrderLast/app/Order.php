<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public $timestamps = true;

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem', 'orderId');
    }

 /*   public function user()
    {
        return $this->hasOne('App\User', 'id');
    }*/

    public function userOrders()
    {
        return $this->hasMany('App\Order', 'userId');
    }
}
