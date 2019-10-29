<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 10/29/2019
 * Time: 2:38 PM
 */

namespace App\Repositories;


use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

	public function register ()
	{
		$this->app->bind (
			'App\Repositories\CustomerRepositoryInterface' ,
			'App\Repositories\CustomerRepository'
		);
	}
}
