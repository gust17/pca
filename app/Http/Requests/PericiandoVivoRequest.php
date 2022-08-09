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
            'cartao_sus' => ['nullable', 'string'],
            'naturalidade' => ['required', 'string'], // select
            'nome' => ['required', 'string'],
            'cpf' => ['required', 'string'],
            'rg' => ['required', 'string'],
            'nomePai' => ['nullable', 'string'],
            'nomeMae' => ['required', 'string'],
            'data_nascimento' => ['required', 'date'],
            'hora_nascimento' => ['nullable', 'date'],
            'idade' => ['nullable'],
            'sexo' => ['required', 'string'], // select
            'cor' => ['required', 'string'], // select
            'tipo_sanguineo' => ['required', 'string'], // select
            'altura' => ['required', 'string'],
            'biotipo' => ['required', 'string'],
            'corOlhos' => ['required', 'string'],
            'cabelo' => ['required', 'string'],
            'cor_cabelo' => ['required', 'string'],
            'marca_cicatriz' => ['required', 'string'],
            'estado_civil' => ['required', 'string'],
            'escolaridade' => ['nullable', 'string'],
            'ocupacao' => ['nullable', 'string'],
            'codigo_cbo' => ['nullable', 'string'],
            'foto' => ['nullable', 'file'],
            'endereco' => ['required', 'array'],
            'documentacao' => ['nullable'],
        ];
    }
}
