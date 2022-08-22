<?php

namespace App\Http\Controllers;

use App\Models\EntidadeExterna;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EntidadeExternaController extends Controller
{
    public function index()
    {
        $models = EntidadeExterna::select('id', 'nome', 'sigla')->get();

        return response($models, 201);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'model.nome' => 'required|string|unique:entidades_externas,nome',
            'model.sigla' => 'nullable|string',
            'model.numero_telefone' => 'required|string',
            'model.email' => 'required|string',
            'model.nome_representante' => 'required|string',
            'model.endereco.tipo_endereco' => 'required|string',
            'model.endereco.cep' => 'required|string',
            'model.endereco.logradouro' => 'required|string',
            'model.endereco.numero' => 'required|string',
            'model.endereco.complemento' => 'nullable|string',
            'model.endereco.bairro' => 'required|string',
            'model.endereco.cidade' => 'required|string',
        ]);

        $endereco_model = Endereco::create($data['model']['endereco']);
        $model = EntidadeExterna::create($data['model']);

        $model->endereco()->associate($endereco_model)->save();


        return response($model, 201);
    }

    public function show($id)
    {
        $model = EntidadeExterna::findOrFail($id);

        return response($model, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'model.nome' => 'required|string|unique:entidades_externas,nome',
            'model.sigla' => 'nullable|string',
            'model.numero_telefone' => 'required|string',
            'model.email' => 'required|string',
            'model.nome_representante' => 'required|string',
            'model.endereco.tipo_endereco' => 'required|string',
            'model.endereco.cep' => 'required|string',
            'model.endereco.logradouro' => 'required|string',
            'model.endereco.numero' => 'required|string',
            'model.endereco.complemento' => 'nullable|string',
            'model.endereco.bairro' => 'required|string',
            'model.endereco.cidade' => 'required|string',
        ]);

        $model = EntidadeExterna::findOrFail($id);

        $model->fill($data['model'])->save();
        $model->endereco->fill($data['model']['endereco'])->save();

        return response($model, 201);


    }
    public function destroy($id)
    {
        $model = EntidadeExterna::findOrFail($id);
        
        if(isset($model->endereco))
            $model->endereco->delete();

        $model->delete();

        return response('OK.', 201);


    }
}
