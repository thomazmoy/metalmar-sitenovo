<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrivacidade extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|min:3',
            'texto'  => 'required|min:3',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'Este campo é obrigatório',
            'titulo.min'      => 'Mínimo de 3 caracteres',
            'texto.required'  => 'Este campo é obrigatório',
            'texto.min'       => 'Mínimo de 3 caracteres',
        ];
    }
}
