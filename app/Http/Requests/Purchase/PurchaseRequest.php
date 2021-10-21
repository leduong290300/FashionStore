<?php

namespace App\Http\Requests\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'userName' => ['required','max:255'],
            'userEmail' => ['required','email','regex:/(.*)@gmail\.com/i'],
            'userPhone' => ['required','numeric'],
            'userAddress' => ['required','max:255'],
            'userNotice' => ['max:255'],
            'userSelectTime' => ['required']
        ];
    }
}
