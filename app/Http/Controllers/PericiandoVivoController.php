<?php

namespace App\Http\Controllers;

use App\Models\PericiandoVivo;
use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Http\Resources\PericiandoVivoResource;

class PericiandoVivoController extends Controller
{
    public function index()
    {
        $models = PericiandoVivo::select('id', 'nome', 'nomeMae', 'nomePai', 'cpf', 'rg')->get();

        return response($models, 201);
    }

    public function store(Request $request)
    {
        $dadosModel = json_decode($request->model);
        $dados_endereco = $dadosModel->endereco;

        $enderecoModel = Endereco::create((array) $dadosModel->endereco);

        $model = PericiandoVivo::create((array) $dadosModel);
        $model->endereco()->associate($enderecoModel)->save();

        return response($model, 201);
    }

    public function show($id)
    {
        $model = PericiandoVivo::findOrFail($id);

        return response($model, 201);
    }

    public function update(Request $request, $id)
    {
        $dadosModel = json_decode($request->model);
        $model = PericiandoVivo::findOrFail($id);
        $model->fill($dadosModel)->save();
        
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
