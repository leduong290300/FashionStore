<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'name' => ['required','max:255'],
            'price' => ['required','numeric'],
            'size' => ['required','max:255'],
            'color' => ['required','max:255'],
            'inventory' => ['required','numeric'],
            'description_long' => ['required'],
            'description_short' => ['required'],
            'category' => ['required'],
            'code' => ['required'],
            'product' => ['required','mimes:png,jpg','max:50000']
        ];
    }
}
