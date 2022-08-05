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
        return response(SolicitanteExterno::create($request->all()), 201);
    }

    public function update($id, SolicitanteExternoRequest $request)
    {
        return response(SolicitanteExterno::findOrFail($id)->update($request->all()), 201);
    }

    public function addFile($id, Request $request) 
    {
        $solicitante_externo = SolicitanteExterno::findOrFail($id);
        if($request->hasFile('file_0')) {
            $solicitante_externo->photo = uploadImg($request->photo_0, 'images/pessoas/documentos');
            $solicitante_externo->save();
        }

        return response('Sucesso', 201);
    }

    public function destroy($id)
    {

    }
}
