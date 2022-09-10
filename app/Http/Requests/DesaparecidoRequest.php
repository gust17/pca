<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesaparecidoRequest extends FormRequest
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
            'model.notificante_desaparecido.nome' => ['required'],
            'model.notificante_desaparecido.numero_documento' => ['required'],
            'model.notificante_desaparecido.email' => ['required'],
            'model.notificante_desaparecido.numero_telefone' => ['required'],
            'model.notificante_desaparecido.endereco' => ['required'],

            'model.nome' => ['required'],
            'model.cpf' => ['required'],
            'model.uf' => ['required'],
            'model.cidade' => ['required'],
            'model.condicao' => ['required'],
            'fotos' => ['required'],
            'model.bo' => ['required'],
            'model.termo_consentimento_falsa_comunicacao' => ['required'],
        ];
    }
}
