<?php

namespace App\Http\Controllers;

use App\Models\ServidorPublico;
use Illuminate\Http\Request;

class ServidorPublicoController extends Controller
{
    public function index()
    {
        return response(ServidorPublico::all(), 201);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['data_nascimento'] = formatDate($inputs['data_nascimento'], 'Y-m-d');

        return response(ServidorPublico::create($inputs), 201);
    }

    public function show(ServidorPublico $servidorPublico)
    {
        return response(ServidorPublico::findOrFail($id), 201);
    }

    public function update(Request $request, ServidorPublico $servidorPublico)
    {
        $inputs = $request->all();
        $inputs['data_nascimento'] = formatDate($inputs['data_nascimento'], 'Y-m-d');

        return response(ServidorPublico::findOrFail($id)->update($inputs), 201);
    }

    public function destroy(ServidorPublico $servidorPublico)
    {
        //
    }

    public function uploadFile($id, Request $request) 
    {
        $data = $request->all();

        $servidor_publico = ServidorPublico::findOrFail($id);

        if($request->hasFile('arquivo_0')) {
            $documentacao = $servidor_publico->documentacao;
            $documentacao[] = [
                'tipo' => $data['tipo_value'],
                'arquivo' => uploadImg($request->arquivo_0, 'documentacao/pessoas')
            ]; 

            $servidor_publico->documentacao = $documentacao;
            $servidor_publico->save();
        }
        
        return response($servidor_publico, 201);
    }

    public function removeFile($id, Request $request) 
    {
        $data = $request->all();

        $servidor_publico = ServidorPublico::findOrFail($id);

        if(count($servidor_publico->documentacao) > 0) {
            $documentacao = $servidor_publico->documentacao;

            array_splice($documentacao, $data['index']);

            $servidor_publico->documentacao = $documentacao;

            $servidor_publico->save();
        }
        
        return response($servidor_publico, 201);
    }
}
