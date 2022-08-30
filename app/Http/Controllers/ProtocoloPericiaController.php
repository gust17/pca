<?php

namespace App\Http\Controllers;

use App\Models\ProtocoloPericia;
use App\Models\ExamePericial;
use App\Models\MaterialPericia;
use Illuminate\Http\Request;

class ProtocoloPericiaController extends Controller
{
    public function index()
    {
        $models = ProtocoloPericia::select('id', 'numero_protocolo')->get();

        return response($models, 201);
    }

    public function store(Request $request)
    {
        $dados_model = $request->model;
        $dados_model['numero_protocolo'] = '';

        $model = ProtocoloPericia::create($dados_model);
        $model->documento_pericial()->create($dados_model['documento_pericial']);
        $model->documento_referencia()->create($dados_model['documento_referencia']);
        if ($model->tipo_pericia == 'Com material') {
            if (isset($request->model['materiais_pericias'])) {
                $model->materiais_pericias()->createMany($dados_model['materiais_pericias']);
            }
        }

        if (isset($request->model['documento_pericial']['anexos'])) {
            $array = [];
            foreach($request->model['documento_pericial']['anexos'] as $anexo) {
                $array[] = uploadImg($anexo, 'documentacao/periciais');
            }
            $model->documento_pericial->anexos = $array;
            $model->documento_pericial->save();
        }

        if (isset($request->model['exames_periciais'])) {
            $model->exames_periciais()->createMany($dados_model['exames_periciais']);
        }

        return response($model, 201);
    }

    public function show($id)
    {
        $model = ProtocoloPericia::where('id', $id)->first();

        return response($model, 201);
    }

    public function update(Request $request, $id)
    {
        // return response($request->all(), 201);

        $model = ProtocoloPericia::find($id);
        $model->fill($request->model)->save();
        $model->documento_pericial->fill($request->model['documento_pericial'])->save();
        $model->documento_referencia->fill($request->model['documento_referencia'])->save();

        if (isset($request->model['documento_pericial']['anexos'])) {
            $array = [];
            foreach($request->model['documento_pericial']['anexos'] as $anexo) {
                $array[] = uploadImg($anexo, 'documentacao/periciais');
            }
            $model->documento_pericial->anexos = $array;
            $model->documento_pericial->save();
        }
        
        if (isset($request->model['exames_periciais'])) {
            $ep_ids = [];
            foreach ($request->model['exames_periciais'] as $ep) {
                $modelEP = ExamePericial::find($ep['id']);
                if (isset($modelEP)) {
                    $ep_ids[] = $modelEP->id;
                    $modelEP->fill($ep)->save();
                } else {
                    $novoEP = $model->exames_periciais()->create($ep);
                    $ep_ids[] = $novoEP->id;
                }
            }
            $model->exames_periciais()->whereNotIn('id', $ep_ids)->delete();
        }
        
        if (isset($request->model['materiais_pericias'])) {
            $mp_ids = [];
            foreach ($request->model['materiais_pericias'] as $mp) {
                $modelMP = MaterialPericia::find($mp['id']);
                if (isset($modelMP)) {
                    $mp_ids[] = $modelMP->id;
                    $modelMP->fill($mp)->save();
                } else {
                    $novoMP = $model->materiais_pericias()->create($mp);
                    $mp_ids[] = $novoMP->id;
                }
            }
            $model->materiais_pericias()->whereNotIn('id', $mp_ids)->delete();
        }
        
        
        return response($model, 201);
    }

    public function destroy($id)
    {
        $model = ProtocoloPericia::findOrFail($id);
        if (isset($model->documento_pericial->anexos)) {
            foreach ($model->documento_pericial->anexos as $anexo) {
                removeImg($anexo);
            }
        }

        $model->delete();

        return response('OK.', 201);
    }

    public function removeFile($id, Request $request) 
    {
        $data = $request->all();

        $model = ProtocoloPericia::findOrFail($id);

        // return response([
        //     'data' => $data,
        //     'model' => $model
        // ], 201);

        if(count($model->documento_pericial->anexos) > 0) {
            $anexos = $model->documento_pericial->anexos;

            array_splice($anexos, $data['index']);

            $model->documento_pericial->anexos = $anexos;

            $model->documento_pericial->save();
        }
        
        return response($model, 201);
    }
}
