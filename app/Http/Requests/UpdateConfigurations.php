<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigurations extends FormRequest
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
            'low_capital' => 'required|numeric',
            'take_profit_limit_1' => 'required|numeric',
            'take_profit_limit_2' => 'required|numeric',
            'take_profit_limit_3' => 'required|numeric',
            'risk' => 'required|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'low_capital.required' => 'El capital bajo es requerido.',
            'take_profit_limit_1.required' => 'El límite tomar ganacias 1 es requerido.',
            'take_profit_limit_2.required' => 'El límite tomar ganacias 2 es requerido.',
            'take_profit_limit_3.required' => 'El límite tomar ganacias 3 es requerido.',
            'risk.required' => 'El riesgo es requerido.',
        ];
    }
}
