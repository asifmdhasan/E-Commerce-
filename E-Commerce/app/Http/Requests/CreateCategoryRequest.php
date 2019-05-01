<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'catname' => 'required',
            'catdescription' => 'required',
            'catpublicationstatus' => 'required'
        ];
    }
        public function messages(){
        return [
            'catdescription.required' => 'Category Description field is empty',
            'catname.required' => 'Category Name field is empty',
            'catpublicationstatus.required' => 'Category Status field is empty'
        ];
    }
}
