<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{


	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize ()
	{
		return true;
	}


	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules ()
	{
		return [
			'fname'            => 'required' ,
			'lname'            => 'required' ,
			'phone'            => 'required|min:8' ,
			'email'            => 'required|email' ,
			'address.address1' => 'required|max:50' ,
			'address.address2' => 'max:50' ,
			'address.address3' => 'required|max:50'
		];
	}

	/**
	 * Custom message for validation
	 *
	 * @return array
	 */
	public function messages ()
	{
		return [
			'email.required' => 'Email is required!' ,
			'fname.required' => 'First Name is required!'
		];
	}

}
