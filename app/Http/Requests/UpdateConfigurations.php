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
            'low_capital' => 'required|numeric|min:0',
            'take_profit_limit_1' => 'required|numeric|min:0',
            'take_profit_limit_2' => 'required|numeric|min:0',
            'take_profit_limit_3' => 'required|numeric|min:0',
            'risk' => 'required|numeric|min:0',
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
            'low_capital.numeric' => 'El capital bajo debe ser un número.',
            'low_capital.min' => 'Tiene que ser un número positivo.',

            'take_profit_limit_1.required' => 'El límite tomar ganacias 1 es requerido.',
            'take_profit_limit_1.numeric' => 'El límite tomar ganacias 1 debe ser un número.',
            'take_profit_limit_1.min' => 'Tiene que ser un número positivo.',

            'take_profit_limit_2.required' => 'El límite tomar ganacias 2 es requerido.',
            'take_profit_limit_2.numeric' => 'El límite tomar ganacias 2 debe ser un número.',
            'take_profit_limit_2.min' => 'Tiene que ser un número positivo.',

            'take_profit_limit_3.required' => 'El límite tomar ganacias 3 es requerido.',
            'take_profit_limit_3.numeric' => 'El límite tomar ganacias 3 debe ser un número.',
            'take_profit_limit_3.min' => 'Tiene que ser un número positivo.',

            'risk.required' => 'El riesgo es requerido.',
            'risk.numeric' => 'El riesgo debe ser un número.',
            'risk.min' => 'Tiene que ser un número positivo.',
        ];
    }
}
