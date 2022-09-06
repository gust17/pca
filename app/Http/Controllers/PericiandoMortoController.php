<?php

namespace App\Http\Controllers;

use App\Models\PericiandoMorto;
use App\Models\Endereco;
use App\Models\Medico;
use App\Models\Cartorio;
use App\Models\CausaMorte;
use Illuminate\Http\Request;

class PericiandoMortoController extends Controller
{
    public function index()
    {
        $mortos = PericiandoMorto::select('id', 'nome', 'nome_mae', 'nome_pai', 'cpf', 'rg', 'data_nascimento', 'data_atestado')->get();

        return response($mortos, 201);
    }

    public function store(Request $request)
    {
        // return response($request->all(), 201);
        // return response([
        //     'a' => $request->morto['foto']->getClientOriginalName(),
        //     'gettype' => $request->morto['foto'],
        //     'aaa' => $request->morto
        // ], 201);
        
        // obrigatório
        $dados_morto = $request->morto;
        $dados_ocorrencia = $request->ocorrencia;
        $dados_causa_obito = $request->causa_obito;
        $dados_causas_mortes = $request->causas_mortes;
        $dados_cartorio = $request->cartorio;
        $dados_medico = $request->medico;
        if($request->mae) {
            $dados_mae = $request->mae;
            $dados_filho_da_mae = $dados_mae['filho'];
        }
            
        // return response([
        //     'tipo' => gettype($dados_causas_mortes),
        //     'dados' => $dados_causas_mortes,
        //     'request' => $request->causas_mortes
        // ], 201);

        $dados_causa_externa = $request->causa_externa;

        $endereco_morto = Endereco::create($dados_morto['endereco']);
        $endereco_ocorrencia = Endereco::create($dados_ocorrencia['endereco']);
        $endereco_causa_externa = Endereco::create($dados_causa_externa['endereco']);
        $medico = Medico::create($dados_medico);
        $cartorio = Cartorio::create($dados_cartorio);

        $morto = PericiandoMorto::create($dados_morto);

        if(!empty($request->morto['foto']) || count($request->morto['foto']) > 0 ) {
            $morto->foto = uploadImg($request->morto['foto'], 'images/periciandos_mortos/profile_pictures');
            $morto->save();
        }
        

        $morto->endereco()->associate($endereco_morto)->save();
        $morto->medico()->associate($medico)->save();
        $morto->cartorio()->associate($cartorio)->save();
        $morto->ocorrencia()->create($dados_ocorrencia);
        $morto->ocorrencia->endereco()->associate($endereco_ocorrencia)->save();
        $morto->causa_externa()->create($dados_causa_externa);
        $morto->causa_externa->endereco()->associate($endereco_causa_externa)->save();
        $morto->causa_obito()->create($dados_causa_obito);


        if($morto->causa_obito) {
            if(count($dados_causas_mortes) > 0) {
                foreach($dados_causas_mortes as $causa_morte) {
                    $morto->causa_obito->causas_mortes()->create($causa_morte);
                }
            }
        }

        if(isset($dados_mae))
            $morto->mae()->create($dados_mae);
        
        if(isset($dados_filho_da_mae))
            $morto->mae->filho()->create($dados_filho_da_mae);

        return response($morto, 201);
    }

    public function show($id)
    {
        return response(PericiandoMorto::findOrFail($id), 201);
    }

    public function update(Request $request, $id)
    {

        // return response($request->all(), 201);

        $morto = PericiandoMorto::findOrFail($id);

        // return response((array) json_decode($request->causas_mortes), 201);

      // obrigatório
      $dados_morto = $request->morto;
      $foto = isset($request->morto['foto']) && !empty($request->morto['foto']) ? $request->morto['foto'] : null;
      $dados_ocorrencia = $request->ocorrencia;
      $dados_causa_obito = $request->causa_obito;
      $dados_causas_mortes = $request->causas_mortes;
      $dados_cartorio = $request->cartorio;
      $dados_medico = $request->medico;
      // situacional
      if($request->mae) {
          $dados_mae = $request->mae;
          $dados_filho_da_mae = $dados_mae['filho'];
      }
      
      $dados_causa_externa = $request->causa_externa;

      $morto->fill($dados_morto)->save();

      if (isset($foto)) {
            if (isset($morto->foto) && !empty($morto->foto)) {
                removeImg($morto->foto);
            }

            $morto->foto = uploadImg($foto, 'images/periciandos_mortos/profile_pictures');
            $morto->save();
        }

      $morto->endereco->fill($dados_morto['endereco'])->save();
      $morto->medico->fill($dados_medico)->save();
      $morto->cartorio->fill($dados_cartorio)->save();
      $morto->ocorrencia->fill($dados_ocorrencia)->save();
      $morto->ocorrencia->endereco->fill($dados_ocorrencia['endereco'])->save();
      $morto->causa_externa->fill($dados_causa_externa)->save();
      $morto->causa_externa->endereco->fill($dados_causa_externa['endereco'])->save();
      $morto->causa_obito->fill($dados_causa_obito)->save();

      if($morto->causa_obito) {
          if(count($dados_causas_mortes) > 0) {
              foreach($dados_causas_mortes as $causa_morte) {
                    if(isset($causa_morte->id)){
                        $causa_morte_model = CausaMorte::find($causa_morte->id);
                        $causa_morte_model->fill($causa_morte)->save();
                    }
                    else
                        $morto->causa_obito->causas_mortes()->create($causa_morte);
              }
          }
      }

      if(isset($dados_mae))
          $morto->mae->fill($dados_mae)->save();
      
      if(isset($dados_filho_da_mae))
          $morto->mae->filho->fill($dados_filho_da_mae)->save();

      return response($morto, 201);
    }

    public function destroy($id)
    {
        $model = PericiandoMorto::findOrFail($id);

        if (isset($model->foto)) {
            removeImg($model->foto);
        }

        if (isset($model->documentacao)) {
            foreach ($model->documentacao as $doc) {
                removeImg($doc['arquivo']);
            }
        }
        $model->delete();
    }

    public function uploadFile($id, Request $request) 
    {
        $data = $request->all();

        $model = PericiandoMorto::findOrFail($id);

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

        $model = PericiandoMorto::findOrFail($id);

        if(count($model->documentacao) > 0) {
            $documentacao = $model->documentacao;

            array_splice($documentacao, $data['index']);

            $model->documentacao = $documentacao;

            $model->save();
        }
        
        return response($model, 201);
    }
}
