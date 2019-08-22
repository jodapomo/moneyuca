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
            'type' => 'required|string|in:BUY,SELL,BUY STOP,SELL STOP,BUY LIMIT,SELL LIMIT',
            'currency_pair' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stop_loss' => 'required|numeric|min:0',
            'take_profit_1' => 'required|numeric|min:0',
            'take_profit_2' => 'nullable|numeric|min:0',
            'take_profit_3' => 'nullable|numeric|min:0',
            'oanda' => '',
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
            'type.required' => 'El tipo de la operación es requerido.',
            'type.string' => 'El tipo de la operación debe ser texto.',
            'type.in' => 'El tipo seleccionado no es válido.',

            'currency_pair.required' => 'El par moneda de la operación es requerido.',
            'currency_pair.string' => 'El par moneda de la operación debe ser texto.',

            'price.required' => 'El precio de la operación es requerido.',
            'price.numeric' => 'El precio de la operación debe ser un número.',
            'price.min' => 'El precio de la operación debe ser un número mayor a cero.',

            'stop_loss.required' => 'El Stop Loss de la operación es requerido.',
            'stop_loss.numeric' => 'El Stop Loss de la operación debe ser un número.',
            'stop_loss.min' => 'El Stop Loss de la operación debe ser un número mayor a cero.',

            'take_profit_1.required' => 'El precio a tomar ganancias 1 de la operación es requerido.',
            'take_profit_1.numeric' => 'El precio a tomar ganancias 1 de la operación debe ser un número.',
            'take_profit_1.min' => 'El precio a tomar ganancias 1 de la operación debe ser un número mayor a cero.',

            'take_profit_2.numeric' => 'El precio a tomar ganancias 2 de la operación debe ser un número.',
            'take_profit_2.min' => 'El precio a tomar ganancias 2 de la operación debe ser un número mayor a cero.',

            'take_profit_3.numeric' => 'El precio a tomar ganancias 3 de la operación debe ser un número.',
            'take_profit_3.min' => 'El precio a tomar ganancias 3 de la operación debe ser un número mayor a cero.',
        ];
    }
}
