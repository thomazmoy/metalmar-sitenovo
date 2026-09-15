<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBanner extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo'     => 'required|min:3',
            'linkbanner' => 'nullable|url',
            'imgbanner'  => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'imgmobile'  => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required'  => 'Este campo é obrigatório',
            'titulo.min'       => 'Mínimo de 3 caracteres',
            'imgbanner.mimes'  => 'Tipo do arquivo inválido',
            'imgbanner.max'    => 'Tamanho do arquivo inválido',
            'imgmobile.mimes'  => 'Tipo do arquivo inválido',
            'imgmobile.max'    => 'Tamanho do arquivo inválido',
        ];
    }
}
