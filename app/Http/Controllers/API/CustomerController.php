<?php

namespace App\Http\Controllers\API;

use App\Address;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Repositories\Customer\CustomerRepository;
use Illuminate\Support\Facades\Response;


class CustomerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param CustomerRepository $customer_repository
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index (CustomerRepository $customer_repository)
	{

		return Response::json ( $customer_repository->all () , 200 );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store ( StoreRequest $request )
	{
		$address = new Address( $request->get ( 'address' ) );

		$cus = new Customer( $request->only ( [ 'fname' , 'lname' , 'phone' , 'email' ] ) );
		$cus->save ();
		$cus->address ()->save ( $address );

		$cus->address;

		return Response::json ( [ 'success' => true , 'customer' => $cus ] , 200 );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Customer $customer
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show ( Customer $customer )
	{
		$customer->address;

		return Response::json ( [ 'success' => true , 'customer' => $customer ] , 200 );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Customer            $customer
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update ( UpdateRequest $request , Customer $customer )
	{

		$customer->update ( $request->only ( [ 'fname' , 'lname' , 'phone' , 'email' , 'address_id' ] ) );
		$customer->save ();

		$customer->address;
		return Response::json ( [ 'success' => true , 'customer' => $customer ] , 200 );

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Customer $customer
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy ( Customer $customer )
	{
		$res = $customer->delete ();

		if ( $res ) {
			return Response::json ( [ 'success' => true ] , 200 );
		} else {
			return Response::json ( [ 'success' => false ] , 500 );
		}
	}
}
