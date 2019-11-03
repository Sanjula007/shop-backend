<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'o_id';
    protected $table      = 'order';

    protected $fillable = ['o_id', 'o_customer', 'o_status', 'o_discount', 'o_total', 'o_description'];

    public function items()
    {
        return $this->hasMany(OrderItem::class,'oi_order_id', 'o_id' );
    }
}
