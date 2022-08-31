<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitanteExternoRequest extends FormRequest
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
            'model.cpf' => ['required', 'string', 'cpf'],
            'model.rg' => ['required', 'string'],
            'model.data_nascimento' => ['required', 'date'],
            'model.nacionalidade' => ['required', 'string'],
            'model.instituicao' => ['required', 'string'],
            'model.area_atuacao' => ['required', 'string'],
            'model.numero_telefone' => ['nullable', 'string'],
            'model.numero_celular' => ['nullable', 'string'],
            'model.email' => ['required', 'string'],
            'model.documentacao' => ['nullable', 'array']
        ];
    }
}
