<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlog extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo'      => 'required|min:3',
            'urltitulo'   => 'required|min:3|unique:blog,urltitulo,' . $this->blog,
            'texto'       => 'required|min:3',
            'descricao'   => 'nullable|min:3',
            'id_categoria'=> 'required|exists:categoria,id',
            'img'         => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'img2'        => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'img3'        => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'imgwhats'    => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required'       => 'Este campo é obrigatório',
            'titulo.min'            => 'Mínimo de 3 caracteres',
            'urltitulo.required'    => 'Este campo é obrigatório',
            'urltitulo.min'         => 'Mínimo de 3 caracteres',
            'urltitulo.unique'      => 'Esta URL já está em uso',
            'texto.required'        => 'Este campo é obrigatório',
            'texto.min'             => 'Mínimo de 3 caracteres',
            'id_categoria.required' => 'Selecione uma categoria',
            'img.mimes'             => 'Tipo do arquivo inválido',
            'img.max'               => 'Tamanho do arquivo inválido',
        ];
    }
}
