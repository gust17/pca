<?php

namespace App\Http\Controllers;

use App\Models\Desaparecido;
use Illuminate\Http\Request;

class DesaparecidoController extends Controller
{
    /**
     * ENTÃO o sistema deverá fazer uma busca, podendo utilizar como parâmetro Nome, Tipo de documento e número, UF do desaparecimento, Município do desaparecimento, Condições do desaparecido, apelido do desaparecido:
     * 
     */
    public function index()
    {
        $models = Desaparecido::all();

        return response($models, 201);
    }

    public function store(Request $request)
    {
        $dados_model = json_decode($request->model);

        $model = Desaparecido::create((array) $dados_model);

        if(isset($dados_model->notificante_desaparecido)) {
            $notificante_desaparecido = NotificanteDesaparecido::create((array) $dados_model->notificante_desaparecido);
            if(isset($dados_model->notificante_desaparecido->endereco)) {
                $endereco = Endereco::create((array) $dados_model->notificante_desaparecido->endereco);
                if(isset($endereco) && isset($notificante_desaparecido)) {
                    $notificante_desaparecido->endereco()->associate($endereco)->save();
                }
            }
            $model->notificante_desaparecido()->associate($notificante_desaparecido)->save();
        }

        if(isset($dados_model->boletim_ocorrencia)) {
            $bo = BoletimOcorrencia::create((array) $dados_model->boletim_ocorrencia);

            $model->boletim_ocorrencia()->associate($bo)->save();
        }
     

        return response($model, 201);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $model = Desaparecido::findOrFail($id);

        $dados_model = json_decode($request->model);

        $model->fill((array) $dados_model)->save();
        $model->notificante_desaparecido->fill((array) $dados_model->notificante_desaparecido)->save();
        $model->notificante_desaparecido->endereco->fill((array) $dados_model->notificante_desaparecido->endereco)->save();
        $model->boletim_ocorrencia->fill((array) $dados_model->boletim_ocorrencia)->save();

        return response($model, 201);
    }

    public function destroy($id)
    {
        //
    }
}
