<?php

namespace App\Http\Controllers;

use App\Models\Desaparecido;
use App\Models\NotificanteDesaparecido;
use App\Models\Endereco;
use App\Models\BoletimOcorrencia;
use Illuminate\Http\Request;
use App\Http\Requests\DesaparecidoRequest;

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

    public function store(DesaparecidoRequest $request)
    {
        $dados_model = $request->model;

        $model = Desaparecido::create($dados_model);

        if ($request->hasFile('fotos')) {
            // return response($request->fotos, 404);
            $fotos = [];
            foreach($request->fotos as $foto) {
                $fotos[]  = uploadImg($foto, 'images/desaparecidos/pictures');
            }
            $model->fotos = $fotos;
            $model->save();
        }

        if(isset($dados_model['notificante_desaparecido'])) {
            $notificante_desaparecido = NotificanteDesaparecido::create($dados_model['notificante_desaparecido']);
            if(isset($dados_model['notificante_desaparecido']['endereco'])) {
                $endereco = Endereco::create($dados_model['notificante_desaparecido']['endereco']);
                if(isset($endereco) && isset($notificante_desaparecido)) {
                    $notificante_desaparecido->endereco()->associate($endereco)->save();
                }
            }
            $model->notificante_desaparecido()->associate($notificante_desaparecido)->save();
        }

        if(isset($dados_model['boletim_ocorrencia'])) {
            $bo = BoletimOcorrencia::create($dados_model['boletim_ocorrencia']);

            $model->boletim_ocorrencia()->associate($bo)->save();
        }
     

        return response($model, 201);
    }

    public function show($id)
    {
        $model = Desaparecido::findOrFail($id);
        
        return response($model, 201);
    }

    public function update(DesaparecidoRequest $request, $id)
    {
        $model = Desaparecido::findOrFail($id);

        $dados_model = $request->model;

        $model->fill($dados_model)->save();

        if ($request->hasFile('fotos')) {
            // return response($request->fotos, 404);
            $fotos = [];
            foreach($request->fotos as $foto) {
                $fotos[]  = uploadImg($foto, 'images/desaparecidos/pictures');
            }
            $model->fotos = $fotos;
            $model->save();
        }
        
        $model->notificante_desaparecido->fill($dados_model['notificante_desaparecido'])->save();
        $model->notificante_desaparecido->endereco->fill($dados_model['notificante_desaparecido']['endereco'])->save();
        $model->boletim_ocorrencia->fill($dados_model['boletim_ocorrencia'])->save();

        return response($model, 201);
    }

    public function destroy($id)
    {
        $model = Desaparecido::findOrFail($id);

        if (!empty($model->fotos)) {
            foreach ($model->fotos as $foto) {
                removeImg($foto);
            }
        }
        
        $model->delete();

        return response('OK.', 201);
    }
}
