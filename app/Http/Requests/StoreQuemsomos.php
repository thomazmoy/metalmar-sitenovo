<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuemsomos extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tituloum'   => 'required|min:3',
            'titulodois' => 'required|min:3',
            'titulotres' => 'required|min:3',
            'textoum'    => 'required|min:3',
            'textodois'  => 'required|min:3',
            'textotres'  => 'required|min:3',
            'imgum'      => 'image|mimes:jpeg,png,jpg,webp|max:1024|dimensions:max_width=800,max_height=800',
            'imgdois'    => 'image|mimes:jpeg,png,jpg,webp|max:1024|dimensions:max_width=800,max_height=800',
            'imgtres'    => 'image|mimes:jpeg,png,jpg,webp|max:1024|dimensions:max_width=800,max_height=800',
        ];
    }

    public function messages(): array
    {
        return [
            'tituloum.required'   => 'Este campo é obrigatório',
            'tituloum.min'        => 'Mínimo de 3 caracteres',
            'titulodois.required' => 'Este campo é obrigatório',
            'titulodois.min'      => 'Mínimo de 3 caracteres',
            'titulotres.required' => 'Este campo é obrigatório',
            'titulotres.min'      => 'Mínimo de 3 caracteres',
            'textoum.required'    => 'Este campo é obrigatório',
            'textoum.min'         => 'Mínimo de 3 caracteres',
            'textodois.required'  => 'Este campo é obrigatório',
            'textodois.min'       => 'Mínimo de 3 caracteres',
            'textotres.required'  => 'Este campo é obrigatório',
            'textotres.min'       => 'Mínimo de 3 caracteres',
            'imgum.mimes'         => 'Tipo do arquivo inválido',
            'imgum.max'           => 'Tamanho do arquivo inválido',
            'imgum.dimensions'    => 'As dimensões não estão corretas',
            'imgdois.mimes'       => 'Tipo do arquivo inválido',
            'imgdois.max'         => 'Tamanho do arquivo inválido',
            'imgdois.dimensions'  => 'As dimensões não estão corretas',
            'imgtres.mimes'       => 'Tipo do arquivo inválido',
            'imgtres.max'         => 'Tamanho do arquivo inválido',
            'imgtres.dimensions'  => 'As dimensões não estão corretas',
        ];
    }
}
