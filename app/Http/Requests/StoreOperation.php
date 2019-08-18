<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOperation extends FormRequest
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
            'type' => 'required|string',
            'currency_pair' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stop_loss' => 'required|numeric|min:0',
            'take_profit_1' => 'required|numeric|min:0',
            'take_profit_2' => 'nullable|numeric|min:0',
            'take_profit_3' => 'nullable|numeric|min:0',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [

    //     ];
    // }
}
