<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required','max:50'],
            'last_name' => ['required','max:50'],
            'email' => ['required','email','max:100','regex:/(.*)@gmail\.com/i'],
            'password' => ['required','confirmed','between:8,32'],
            'password_confirmation' => ['required']
        ];
    }
}
