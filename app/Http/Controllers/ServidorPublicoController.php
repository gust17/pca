<?php

namespace App\Http\Controllers;

use App\Models\ServidorPublico;
use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Http\Requests\ServidorPublicoRequest;

class ServidorPublicoController extends Controller
{
    public function index()
    {
        return response(ServidorPublico::all(), 201);
    }

    public function store(ServidorPublicoRequest $request)
    {

        // return response($request->model['foto']->getClientOriginalName(), 201);

        $data = $request->model;

        $endereco = Endereco::create($data['endereco']);

        $servidor_publico = ServidorPublico::create($data);

        $servidor_publico->endereco()->associate($endereco)->save();

        if (isset($request->model['foto'])) {
            $servidor_publico->foto = uploadImg($request->model['foto'], 'images/servidores_publicos/profile_pictures');
            $servidor_publico->save();
        }

        return response($servidor_publico, 201);
    }

    public function show($id)
    {
        return response(ServidorPublico::findOrFail($id), 201);
    }

    public function update(ServidorPublicoRequest $request, $id)
    {
        $servidor_publico = ServidorPublico::findOrFail($id);

        $data = $request->model;
        $foto = isset($request->model['foto']) ? $request->model['foto'] : null;
        unset($data['foto']);
        $servidor_publico->fill($data)->save();
        $servidor_publico->endereco->fill($data['endereco'])->save();

        if (isset($foto)) {
            if (isset($servidor_publico->foto) && !empty($servidor_publico->foto)) {
                removeImg($servidor_publico->foto);
            }

            $servidor_publico->foto = uploadImg($foto, 'images/servidores_publicos/profile_pictures');
            $servidor_publico->save();
        }

        return response($servidor_publico, 201);
    }

    public function destroy($id)
    {
        $model = ServidorPublico::findOrFail($id);

        if (isset($model->foto)) {
            removeImg($model->foto);
        }
        
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

        $servidor_publico = ServidorPublico::findOrFail($id);

        if($request->hasFile('arquivo_0')) {
            $documentacao = $servidor_publico->documentacao;
            $documentacao[] = [
                'tipo' => $data['tipo'],
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
