<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContato extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome'     => 'required|min:3',
            'email'    => 'required|email',
            'telefone' => 'required|min:8',
            'assunto'  => 'required|min:3',
            'mensagem' => 'required|min:10',
            'hp_company_field' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'     => 'Este campo é obrigatório',
            'nome.min'          => 'Mínimo de 3 caracteres',
            'email.required'    => 'Este campo é obrigatório',
            'email.email'       => 'E-mail inválido',
            'telefone.required' => 'Este campo é obrigatório',
            'telefone.min'      => 'Mínimo de 8 caracteres',
            'assunto.required'  => 'Este campo é obrigatório',
            'assunto.min'       => 'Mínimo de 3 caracteres',
            'mensagem.required' => 'Este campo é obrigatório',
            'mensagem.min'      => 'Mínimo de 10 caracteres',
        ];
    }
}
