<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
			'name'        => 'required|max:100' ,
			'description' => 'required|max:1000' ,
			'price'       => 'required|Numeric' ,
			'category'    => 'required|Integer|exists:product_categories,pc_id' ,
			'image'       => 'required|image' ,
		];
	}
}
