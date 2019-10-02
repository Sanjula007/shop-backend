<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

	public function address()
	{
		return $this->hasOne('App\Address','id','address_id');
	}
}
