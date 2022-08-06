<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServidorPublicoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'string'],
            'matricula' => ['required', 'string'],
            'rg' => ['required', 'string'],
            'cpf' => ['required', 'string'],
            'data_nascimento' => ['required', 'date'],
            'orientacao_sexual' => ['required', 'string'],
            'cor' => ['required', 'string'],
            'nacionalidade' => ['required', 'string'],
            'naturalidade' => ['required', 'string'],
            'estado_civil' => ['required', 'string'],
            'lotacao' => ['required', 'string'],
            'grupo_trabalho' => ['required', 'string'],
            'area_atuacao' => ['required', 'string'],
            'formacao_profissional' => ['required', 'string'],
            'numero_telefone' => ['nullable', 'string'],
            'numero_celular' => ['nullable', 'string'],
            'email' => ['required', 'string'],
            'documentacao' => ['nullable', 'array'],

            'tipo_endereco' => ['required', 'string'],
            'cep' => ['required', 'string'],
            'logradouro' => ['required', 'string'],
            'numero' => ['required', 'string'],
            'complemento' => ['nullable', 'string'],
            'bairro' => ['required', 'string'],
            'uf' => ['required', 'string'],
        ];
    }
}
