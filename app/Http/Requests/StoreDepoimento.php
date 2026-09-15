<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepoimento extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome'  => 'required|min:3',
            'cargo' => 'nullable|min:3',
            'texto' => 'required|min:3',
            'img'   => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'  => 'Este campo é obrigatório',
            'nome.min'       => 'Mínimo de 3 caracteres',
            'texto.required' => 'Este campo é obrigatório',
            'texto.min'      => 'Mínimo de 3 caracteres',
            'img.mimes'      => 'Tipo do arquivo inválido',
            'img.max'        => 'Tamanho do arquivo inválido',
        ];
    }
}
