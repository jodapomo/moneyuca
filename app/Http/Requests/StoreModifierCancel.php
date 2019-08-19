<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModifierCancel extends FormRequest
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

    public function rules()
    {
        return [
            'operation_reference' => 'required|exists:operations,id',
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
            'operation_reference.required' => 'Seleccione la operación que desea cancelar.',
            'operation_reference.exists' => 'Operación seleccionada no es válida.',
        ];
    }
}
