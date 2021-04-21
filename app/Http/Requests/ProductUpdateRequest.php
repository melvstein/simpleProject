<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'category' => 'required|string|max:255',
            'name' => "required|string|max:255|unique:products,name,{$this->product->id}",
            'price' => 'required|between:0,99.99',
            'sale_price' => 'nullable|between:0,99.99',
            'units' => 'required|string',
            'details' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];
    }
}
