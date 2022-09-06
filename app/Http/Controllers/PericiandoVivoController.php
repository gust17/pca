<?php

namespace App\Http\Controllers;

use App\Models\PericiandoVivo;
use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Http\Requests\PericiandoVivoRequest;

class PericiandoVivoController extends Controller
{
    public function index()
    {
        $models = PericiandoVivo::select('id', 'nome', 'nome_mae', 'nome_pai', 'cpf', 'rg')->get();

        return response($models, 201);
    }

    public function store(PericiandoVivoRequest $request)
    {
        // return response($request->all(), 201);

        $dadosModel = $request->model;
        $dados_endereco = $dadosModel['endereco'];

        $enderecoModel = Endereco::create($dados_endereco);

        $model = PericiandoVivo::create($dadosModel);
        $model->endereco()->associate($enderecoModel)->save();

        if(!empty($request->model['foto'])) {
            $model->foto = uploadImg($request->model['foto'], 'images/periciandos_vivos/profile_pictures');
            $model->save();
        }

        return response($model, 201);
    }

    public function show($id)
    {
        $model = PericiandoVivo::findOrFail($id);

        return response($model, 201);
    }

    public function update(PericiandoVivoRequest $request, $id)
    {
        $dadosModel = $request->model;
        $dados_endereco = $dadosModel['endereco'];

        $model = PericiandoVivo::findOrFail($id);
        $model->fill($dadosModel)->save();

        $model->endereco->fill($dados_endereco)->save();

        $foto = isset($request->model['foto']) && !empty($request->model['foto']) ? $request->model['foto'] : null;

        if (isset($foto)) {
            if (isset($morto->foto) && !empty($morto->foto)) {
                removeImg($morto->foto);
            }

            $morto->foto = uploadImg($foto, 'images/periciandos_vivos/profile_pictures');
            $morto->save();
        }
        
        return response($model, 201);
    }

    public function destroy($id)
    {
        //
    }

    public function uploadFile($id, Request $request) 
    {
        $data = $request->all();

        $model = PericiandoVivo::findOrFail($id);

        if($request->hasFile('arquivo_0')) {
            $documentacao = $model->documentacao;
            $documentacao[] = [
                'tipo' => $data['tipo'],
                'arquivo' => uploadImg($request->arquivo_0, 'documentacao/pessoas')
            ]; 

            $model->documentacao = $documentacao;
            $model->save();
        }
        
        return response($model, 201);
    }

    public function removeFile($id, Request $request) 
    {
        $data = $request->all();

        $model = PericiandoVivo::findOrFail($id);

        if(count($model->documentacao) > 0) {
            $documentacao = $model->documentacao;

            array_splice($documentacao, $data['index']);

            $model->documentacao = $documentacao;

            $model->save();
        }
        
        return response($model, 201);
    }
}
