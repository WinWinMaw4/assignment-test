<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>'required|unique:products,name|min:2|max:50',
            "category"=>'required',
            "sub_category"=>'required',
            "addOn"=>'required',//null
            'highlight'=>'required|max:100',
            'productCode'=>'required|unique:products,product_code',
            'ordering'=>'nullable|max:100',//nul
            'original_price'=>'required|numeric',
            'min_order'=>'required|min:1',
            'max_order'=>'required|min:1',
            'product_unit_value'=>'required|numeric',
            'prd_unit'=>'required',
            'search_keyword'=>'required',
            'description'=>'required|min:3|max:500',
            'photo'=>'required|file|mimes:jpeg,png|max:5000',
//                'photo'=>'required',


        ];
    }
}
