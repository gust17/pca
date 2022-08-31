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
            'model.nome' => ['required', 'string'],
            'model.matricula' => ['required', 'string'],
            'model.rg' => ['required', 'string'],
            'model.cpf' => ['required', 'string', 'cpf'],
            'model.data_nascimento' => ['required', 'date'],
            'model.orientacao_sexual' => ['required', 'string'],
            'model.cor' => ['required', 'string'],
            'model.nacionalidade' => ['required', 'string'],
            'model.naturalidade' => ['required', 'string'],
            'model.estado_civil' => ['required', 'string'],
            'model.lotacao' => ['required', 'string'],
            'model.grupo_trabalho' => ['required', 'string'],
            'model.area_atuacao' => ['required', 'string'],
            'model.formacao_profissional' => ['required', 'string'],
            'model.numero_telefone' => ['nullable', 'string'],
            'model.numero_celular' => ['nullable', 'string'],
            'model.email' => ['required', 'string'],
            'model.foto' => ['nullable'],

            'model.endereco.tipo_endereco' => ['required', 'string'],
            'model.endereco.cep' => ['required', 'string'],
            'model.endereco.logradouro' => ['required', 'string'],
            'model.endereco.numero' => ['required', 'string'],
            'model.endereco.complemento' => ['nullable', 'string'],
            'model.endereco.bairro' => ['required', 'string'],
            'model.endereco.cidade' => ['required', 'string'],
        ];
    }
}
