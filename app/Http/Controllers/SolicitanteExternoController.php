<?php

namespace App\Http\Controllers;

use App\Models\SolicitanteExterno;
use App\Http\Requests\SolicitanteExternoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SolicitanteExternoController extends Controller
{
    public function index() 
    {
        return response(SolicitanteExterno::all(), 201);
    }

    public function store(SolicitanteExternoRequest $request)
    {

        $data = $request->model;

        return response(SolicitanteExterno::create($data), 201);
    }

    public function update($id, SolicitanteExternoRequest $request)
    {

        $data = $request->model;

        $model = SolicitanteExterno::findOrFail($id);
        $model->fill($data)->save();

        return response($model, 201);
    }

    public function destroy($id)
    {
        $model = SolicitanteExterno::findOrFail($id);
        if (isset($model->documentacao)) {
            foreach ($model->documentacao as $doc) {
                removeImg($doc['arquivo']);
            }
        }
        $model->delete();

        return response('OK.', 201);
    }

    public function uploadFile($id, Request $request) 
    {
        $data = $request->all();

        $solicitante_externo = SolicitanteExterno::findOrFail($id);

        if($request->hasFile('arquivo_0')) {
            $documentacao = $solicitante_externo->documentacao;
            $documentacao[] = [
                'tipo' => $data['tipo'],
                'arquivo' => uploadImg($request->arquivo_0, 'documentacao/pessoas')
            ]; 

            $solicitante_externo->documentacao = $documentacao;
            $solicitante_externo->save();
        }
        
        return response($solicitante_externo, 201);
    }

    public function removeFile($id, Request $request) 
    {
        $data = $request->all();

        $solicitante_externo = SolicitanteExterno::findOrFail($id);

        if(count($solicitante_externo->documentacao) > 0) {
            $documentacao = $solicitante_externo->documentacao;

            array_splice($documentacao, $data['index']);

            $solicitante_externo->documentacao = $documentacao;

            $solicitante_externo->save();
        }
        
        return response($solicitante_externo, 201);
    }

    public function show($id)
    {
        return response(SolicitanteExterno::findOrFail($id), 201);
    }

    private function validation(Request $request) {
        $validator = Validator::make($request->model, [
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
        ]);
 
        if ($validator->fails()) {
            return response($validator->errors(), 402);
        }
    }
}
