<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pizzaUpdateRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:40',
            'price' => 'required|numeric|min:0|max:1000',
            'description' => 'required|string|min:0|max:100',
            'image' => 'image|mimes:jpeg,png,jpg'
        ];
    }
}
