<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

	protected $fillable = [ 'id' , 'name' , 'description' , 'price' , 'category' , 'image' ];


	public function stock ()
	{
		return $this->hasOne ( Stock::class );
	}
}
