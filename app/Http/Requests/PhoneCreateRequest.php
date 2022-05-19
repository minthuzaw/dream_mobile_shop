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
            'image' => ['required', 'image'],
            'brand_id' => 'required',
            'unit_price' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'categories' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'model.required' => 'Model is required',
            'name.required' => 'Name is required',
            'stock.required' => 'Stock is required',
            'image.required' => 'Image is required',
            'brand_id.required' => 'Brand is required',
            'unit_price.required' => 'Price is required',
            'description.required' => 'Description is required',
            'categories.required' => 'Select at least one category',
            'user_id' => 'required',
        ];
    }
}
