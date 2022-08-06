<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitanteExterno;
use App\Http\Requests\SolicitanteExternoRequest;

class SolicitanteExternoController extends Controller
{
    public function index() 
    {
        return response(SolicitanteExterno::all(), 201);
    }

    public function store(SolicitanteExternoRequest $request)
    {
        $inputs = $request->all();
        $inputs['data_nascimento'] = formatDate($inputs['data_nascimento'], 'Y-m-d');

        return response(SolicitanteExterno::create($inputs), 201);
    }

    public function update($id, SolicitanteExternoRequest $request)
    {
        $inputs = $request->all();
        $inputs['data_nascimento'] = formatDate($inputs['data_nascimento'], 'Y-m-d');

        return response(SolicitanteExterno::findOrFail($id)->update($inputs), 201);
    }

    public function uploadFile($id, Request $request) 
    {
        $data = $request->all();

        $solicitante_externo = SolicitanteExterno::findOrFail($id);

        if($request->hasFile('arquivo_0')) {
            $documentacao = $solicitante_externo->documentacao;
            $documentacao[] = [
                'tipo' => $data['tipo_value'],
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
}
