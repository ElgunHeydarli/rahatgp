<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required|max:200',
            'details' => 'nullable',
            'price' => 'required',
            'discount' => 'nullable',
            'images' => 'required',
            'images.*' => 'mimes:png,jpg',
            'category_id' => 'required|integer',
            'colors' => 'nullable',
            'material' => 'nullable',
            'brand' => 'nullable',
            'category' => 'nullable',
            'gender' => 'required',
            'free_cargo' => 'nullable',
            'delivery_time' => 'nullable',
            'product_group' => 'nullable',
        ];
    }
}
