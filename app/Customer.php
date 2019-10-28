<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed address
 */
class Customer extends Model
{
	protected $table = 'customer';

	protected $fillable = [ "fname" , "lname" , "phone" , "email" ];

	public function address ()
	{
		return $this->hasOne ( 'App\Address' , 'id' , 'address_id' );
	}
}
