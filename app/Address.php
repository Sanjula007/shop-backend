<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = ['address1','address2','address3'];

    public function customer(){
		return $this->belongsTo ( Customer::class );
	}
}
