<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModifierBreakEven extends FormRequest
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
            'operation_reference.required' => 'Seleccione una operación antes de crear el modificador Break Even.',
            'operation_reference.exists' => 'Operación seleccionada no es válida.',
        ];
    }

}
