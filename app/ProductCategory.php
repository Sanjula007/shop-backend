<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $primaryKey = 'pc_id';
    protected $fillable = [ 'pc_id', 'pc_name', 'pc_description', 'pc_order', 'pc_parent', 'pc_status' ];

    public function children(){
        return $this->hasMany(ProductCategory::class,'pc_parent','pc_id');
    }

    public function parent(){
        return $this->belongsTo(ProductCategory::class,'pc_parent','pc_id');
    }
}
