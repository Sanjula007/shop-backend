<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pc_name'        => 'required|max:100',
            'pc_description' => 'required|max:10000',
            'pc_order'       => 'Integer',
            'pc_parent'      => 'Integer|exists:product_categories,pc_id',
            'pc_status'      => 'Integer',
        ];
    }
}
