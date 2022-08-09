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
            'model' => [
                'nome' => ['required', 'string'],
                'cpf' => ['required', 'string'],
                'rg' => ['required', 'string'],
                'data_nascimento' => ['required', 'date'],
                'nacionalidade' => ['required', 'string'],
                'instituicao' => ['required', 'string'],
                'area_atuacao' => ['required', 'string'],
                'numero_telefone' => ['nullable', 'string'],
                'numero_celular' => ['nullable', 'string'],
                'email' => ['required', 'string'],
                'documentacao' => ['nullable', 'array']
            ]
        ];
    }
}
