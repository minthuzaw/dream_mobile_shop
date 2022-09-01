<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneCreateRequest extends FormRequest
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
            'model' => 'required',
            'name' => 'required',
            'stock' => 'required',
            'brand_id' => 'required',
            'unit_price' => 'required',
            'description' => 'required',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'model.required' => 'Model is required',
            'name.required' => 'Name is required',
            'stock.required' => 'Stock is required',
            'brand_id.required' => 'Brand is required',
            'unit_price.required' => 'Price is required',
            'description.required' => 'Description is required',
            'user_id' => 'required',
        ];
    }
}
