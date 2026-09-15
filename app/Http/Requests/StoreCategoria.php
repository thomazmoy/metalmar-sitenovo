<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoria extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|min:3',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Este campo é obrigatório',
            'nome.min'      => 'Mínimo de 3 caracteres',
        ];
    }
}
