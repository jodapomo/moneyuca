<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModifierCloseAll extends FormRequest
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
            'currency_pair' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'currency_pair.required' => 'El par moneda es requerido.',
            'currency_pair.string' => 'El par moneda debe ser de tipo texto.',
        ];
    }
}
