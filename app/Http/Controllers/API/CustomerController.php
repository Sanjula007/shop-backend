<?php

namespace App\Http\Controllers\API;

use App\Address;
use App\Customer;
use App\Http\Requests\Customer\UpdateRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;


class CustomerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index ()
	{
		$customers = Customer::with ( 'address' )->paginate ( 15 );
		return Response::json ( $customers , 200 );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store ( StoreRequest $request )
	{


		$address           = new Address();
		$address->address1 = $request->input ( 'address.address1' );
		$address->address2 = $request->input ( 'address.address2' );
		$address->address3 = $request->input ( 'address.address3' );

		$address->save ();

		$cus = new Customer();

		$cus->fname      = $request->input ( 'fname' );
		$cus->lname      = $request->input ( 'lname' );
		$cus->phone      = $request->input ( 'phone' );
		$cus->email      = $request->input ( 'email' );
		$cus->address_id = $address->id;

		$cus->save ();
		$cus->address;

		return Response::json ( [ 'success' => true , 'customer' => $cus ] , 200 );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Customer $customer
	 * @return \Illuminate\Http\Response
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
	 * @return \Illuminate\Http\Response
	 */
	public function update ( UpdateRequest $request , Customer $customer )
	{


		$customer->fname = $request->input ( 'fname' );
		$customer->lname = $request->input ( 'lname' );
		$customer->phone = $request->input ( 'phone' );
		$customer->email = $request->input ( 'email' );

		$customer->save ();
		$customer->address;
		return Response::json ( [ 'success' => true , 'customer' => $customer ] , 200 );

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Customer $customer
	 * @return \Illuminate\Http\Response
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
