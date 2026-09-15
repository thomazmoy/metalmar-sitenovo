<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGaleria extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo'   => 'required|min:3',
            'descricao'=> 'nullable|min:3',
            'img'      => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'Este campo é obrigatório',
            'titulo.min'      => 'Mínimo de 3 caracteres',
            'img.mimes'       => 'Tipo do arquivo inválido',
            'img.max'         => 'Tamanho do arquivo inválido',
        ];
    }
}
