<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModifierMoveStopLoss extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'operation_reference' => 'required|exists:operations,id',
        ];
    }

    public function messages()
    {
        return [
            'operation_reference.required' => 'Seleccione la operación que desea cancelar.',
            'operation_reference.exists' => 'Operación seleccionada no es válida.',

            'price.required' => 'El precio del modificador es requerido.',
            'price.numeric' => 'El precio del modificador debe ser un número.',
            'price.min' => 'El precio del modificador debe ser un número mayor a cero.',
        ];
    }
}
