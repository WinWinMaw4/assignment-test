<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateproductRequest extends FormRequest
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
            "name"=>'required|unique:products,name,'.$this->route('product')->id.'|min:2|max:50',
            "category"=>'required',
            "sub_category"=>'required',
            "addOn"=>'nullable',//null
            'highlight'=>'required|max:100',
            'productCode'=>'required',
            'ordering'=>'nullable|max:100',//nul
            'original_price'=>'required',
            'min_order'=>'required|min:1',
            'max_order'=>'required|min:1',
            'product_unit_value'=>'required',
            'prd_unit'=>'required',
            'search_keyword'=>'required',
            'description'=>'required|min:3|max:500',
            'photo'=>'nullable|file|mimes:jpeg,png|max:5000'
        ];
    }
}
