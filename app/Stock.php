<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
	//

	protected $fillable = [ 'product_id' , 'quantity' ];

	public function stock ()
	{
		return $this->belongsTo ( Product::class );
	}
}
