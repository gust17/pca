<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PericiandoMortoRequest extends FormRequest
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
            'morto.tipo_obito' => ['required'],
            'morto.data_obito' => ['required'],
            'morto.naturalidade' => ['required'],
            'morto.nome' => ['required'],
            'morto.nome_mae' => ['required'],
            'morto.data_nascimento' => ['required'],
            'morto.sexo' => ['required'],
            'morto.cor' => ['required'],
            'morto.estado_civil' => ['required'],
            'morto.endereco.logradouro' => ['required'],
            'morto.endereco.numero' => ['required'],
            'morto.endereco.cep' => ['required'],
            'morto.endereco.bairro' => ['required'],
            'morto.endereco.cidade' => ['required'],
            

            'ocorrencia.local' => ['required'],
            'ocorrencia.estabelecimento' => ['required'],
            'ocorrencia.codigo_cnes' =>  ['required'],
            'ocorrencia.endereco.logradouro' => ['required'],
            'ocorrencia.endereco.numero' => ['required'],
            'ocorrencia.endereco.cep' => ['required'],
            'ocorrencia.endereco.bairro' => ['required'],
            'ocorrencia.endereco.cidade' => ['required'],


            'causa_obito.data_entrada_dml' => ['required'],
            'causa_obito.hora_entrada_dml' => ['required'],
            'causa_obito.data_obito' => ['required'],
            'causa_obito.hora_obito' => ['required'],
            'causa_obito.natureza_obito' => ['required'],
            // 'objeto_causa_obito' => ['required'],
            // 'obito_mulher_idade_fertil' => ['required'],
            // 'obito_mulher_idade_fertil_momento' => ['required'],
            // 'assistencia_durante_doenca' => ['required'],
            // 'diagnostico_confirmado_necropsia' => ['required'],

            'medico.nome' => ['required'],
            'medico.crm' => ['required'],
        ];
    }
}
