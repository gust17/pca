<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PericiandoVivoRequest extends FormRequest
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
            'model.cartao_sus' => ['nullable', 'string'],
            'model.naturalidade' => ['required', 'string'], // select
            'model.nome' => ['required', 'string'],
            'model.cpf' => ['required', 'string'],
            'model.rg' => ['required', 'string'],
            'model.nome_pai' => ['nullable', 'string'],
            'model.nome_mae' => ['required', 'string'],
            'model.data_nascimento' => ['required', 'date'],
            'model.hora_nascimento' => ['nullable', 'date'],
            'model.idade' => ['nullable'],
            'model.sexo' => ['required', 'string'], // select
            'model.cor' => ['required', 'string'], // select
            'model.tipo_sanguineo' => ['required', 'string'], // select
            'model.altura' => ['required', 'string'],
            'model.biotipo' => ['required', 'string'],
            'model.cor_olhos' => ['required', 'string'],
            'model.cabelo' => ['required', 'string'],
            'model.cor_cabelo' => ['required', 'string'],
            'model.marca_cicatriz' => ['required', 'string'],
            'model.estado_civil' => ['required', 'string'],
            'model.escolaridade' => ['nullable', 'string'],
            'model.ocupacao' => ['nullable', 'string'],
            'model.codigo_cbo' => ['nullable', 'string'],
            'model.foto' => ['nullable', 'file'],
            'model.endereco' => ['required', 'array'],
            'model.documentacao' => ['nullable'],
        ];
    }
}
