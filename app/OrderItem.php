<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table      = 'order_item';
    protected $primaryKey = 'oi_id';

    protected $fillable = [ 'oi_id', 'oi_order_id', 'oi_product', 'oi_product_unit_price', 'oi_product_total_discount', 'oi_quantity' ];


    public function order(){
        return $this->belongsTo(Order::class,'o_order_id','o_id');
    }
}
