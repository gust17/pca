<?php

namespace App\Http\Controllers;

use App\Models\ServidorPublico;
use App\Models\Endereco;
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

        $endereco = Endereco::create($inputs);

        $servidor_publico = ServidorPublico::create($inputs);

        $servidor_publico->endereco()->associate($endereco)->save();

        if($request->hasFile('foto_0')) {
            $servidor_publico->foto = uploadImg($request->foto_0, 'images/servidores_publicos/profile_pictures');
            $servidor_publico->save();
        }

        return response($servidor_publico, 201);
    }

    public function show($id)
    {
        return response(ServidorPublico::findOrFail($id), 201);
    }

    public function update(Request $request, $id)
    {
        $servidor_publico = ServidorPublico::findOrFail($id);

        $inputs = $request->all();
        $inputs['data_nascimento'] = formatDate($inputs['data_nascimento'], 'Y-m-d');

        $servidor_publico->fill($inputs)->save();

        $endereco = Endereco::findOrFail($servidor_publico->endereco_id);
        $endereco->fill($inputs)->save();

        if($request->hasFile('foto_0')) {
            if($servidor_publico->foto)
                removeImg($servidor_publico->foto);
                
            $servidor_publico->foto = uploadImg($request->foto_0, 'images/servidores_publicos/profile_pictures');
            $servidor_publico->save();
        }

        return response(ServidorPublico::findOrFail($id)->update($inputs), 201);
    }

    public function destroy($id)
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
