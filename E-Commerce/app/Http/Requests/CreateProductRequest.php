<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'productname' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'shortdescription' => 'required',
            'longdescription' => 'required',
            'publicationstatus' => 'required',
            'publicationstatus' => 'required'
        ];
    }
    public function messages(){
        return [
            'productname.required' => 'Product Name field is empty',
            'price.required' => 'Product Price field is empty',
            'quantity.required' => 'Product Quantity field is empty',
            'shortdescription.required' => 'Product Short Description Status field is empty',
            'longdescription.required' => 'Product Long Description Status field is empty',
            'publicationstatus.required' => 'Product Status field is empty'
        ];
    }
}
