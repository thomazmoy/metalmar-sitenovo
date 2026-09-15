<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiteconfig extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nomesite'      => 'required|min:3',
            'descricao'     => 'required|min:3',
            'palavraschave' => 'required|min:3',
            'endereco'      => 'required|min:3',
            'email'         => 'required|min:3',
            'celular'       => 'required|min:3',
            'logobranca'    => 'image|mimes:jpeg,png,jpg,webp|max:512|dimensions:max_width=500,max_height=500',
            'logoescura'    => 'image|mimes:jpeg,png,jpg,webp|max:512|dimensions:max_width=500,max_height=500',
            'favicon'       => 'image|mimes:jpeg,png,jpg,webp|max:256|dimensions:max_width=100,max_height=100',
        ];
    }

    public function messages(): array
    {
        return [
            'nomesite.required'      => 'Este campo é obrigatório',
            'nomesite.min'           => 'Mínimo de 3 caracteres',
            'descricao.required'     => 'Este campo é obrigatório',
            'descricao.min'          => 'Mínimo de 3 caracteres',
            'palavraschave.required' => 'Este campo é obrigatório',
            'palavraschave.min'      => 'Mínimo de 3 caracteres',
            'endereco.required'      => 'Este campo é obrigatório',
            'endereco.min'           => 'Mínimo de 3 caracteres',
            'email.required'         => 'Este campo é obrigatório',
            'email.min'              => 'Mínimo de 3 caracteres',
            'celular.required'       => 'Este campo é obrigatório',
            'celular.min'            => 'Mínimo de 3 caracteres',
            'logobranca.mimes'       => 'Tipo do arquivo inválido',
            'logobranca.max'         => 'Tamanho do arquivo inválido',
            'logobranca.dimensions'  => 'As dimensões não estão corretas',
            'logoescura.mimes'       => 'Tipo do arquivo inválido',
            'logoescura.max'         => 'Tamanho do arquivo inválido',
            'logoescura.dimensions'  => 'As dimensões não estão corretas',
            'favicon.mimes'          => 'Tipo do arquivo inválido',
            'favicon.max'            => 'Tamanho do arquivo inválido',
            'favicon.dimensions'     => 'As dimensões não estão corretas',
        ];
    }
}
