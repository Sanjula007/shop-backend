<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 10/29/2019
 * Time: 2:25 PM
 */

namespace App\Repositories\Customer;


interface CustomerRepositoryInterface
{
	public static function all ();

	public function getWithAddress ( $customer_id );

	public function get ( $customer_id );
}
