<?php

namespace App\Http\Controllers;

use App\Models\UsuarioPerfil;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioPerfilController extends Controller
{
    public function index()
    {
        $models = UsuarioPerfil::all();

        return response($models, 201);
    }

    public function store(Request $request)
    {
        $dadosModel = json_decode($request->model);
        $model = UsuarioPerfil::create((array) $dadosModel);

        return response($model, 201);
    }

    public function show($id)
    {
        $model = UsuarioPerfil::findOrFail($id);

        return response($model, 201);
    }

    public function update(Request $request, $id)
    {
        $dadosModel = json_decode($request->model);
        $model = UsuarioPerfil::findOrFail($id);
        $model->fill($dadosModel)->save();
        
        return response($model, 201);
    }

    public function destroy($id)
    {
        //
    }

    public function getOptions()
    {
        $models = DB::table('usuarios_perfis')->select('nome as text', 'id as value')->get();
        
        return response($models, 201);
    }
}
