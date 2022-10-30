<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
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
            'name'=>'required|unique:products',
            'price'=>'required|integer',
            'image'=>'image|required',
            'size'=>'required',
            'category_id'=>'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Product name is required',
            'name.unique' => 'Product name has been already taken',
            'price.required' => 'Product price is required',
            'size.required' => 'Product size is required',
            'image.image' => 'product image should be image',
            'image.required' => 'product image should be entered',
            'category_id.required' => 'product image should be entered',

        ];
    }

}
