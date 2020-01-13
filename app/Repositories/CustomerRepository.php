<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 10/29/2019
 * Time: 2:26 PM
 */

namespace App\Repositories;

use App\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
	public function all ()
	{
		return Customer::with ( 'address' )->paginate ( 15 );;
	}


	public function getWithAddress ( $customer_id )
	{
		return Customer::with ( [ 'address' ] )->find ( $customer_id );
	}

	public function get ( $customer_id )
	{
		return Customer::find ( $customer_id );
	}
}
