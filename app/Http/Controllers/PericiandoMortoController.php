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


        // obrigatório
        $dados_morto = json_decode($request->morto);
        $dados_ocorrencia = json_decode($request->ocorrencia);
        $dados_causa_obito = json_decode($request->causa_obito);
        $dados_causas_mortes = json_decode($request->causas_mortes);
        $dados_cartorio = json_decode($request->cartorio);
        $dados_medico = json_decode($request->medico);
        // situacional
        if($request->mae) {
            $dados_mae = json_decode($request->mae);
            $dados_filho_da_mae = $dados_mae->filho;
        }
        
        $dados_causa_externa = json_decode($request->causa_externa);

        $endereco_morto = Endereco::create((array) $dados_morto->endereco);
        $endereco_ocorrencia = Endereco::create((array) $dados_ocorrencia->endereco);
        $endereco_causa_externa = Endereco::create((array) $dados_causa_externa->endereco);
        $medico = Medico::create((array) $dados_medico);
        $cartorio = Cartorio::create((array) $dados_cartorio);

        $morto = PericiandoMorto::create((array) $dados_morto);

        // if($request->foto_morto_0) {
        //     $morto->foto = uploadImg($request->foto_morto_0, 'images/periciandos_mortos/profile_pictures');
        //     $morto->save();
        // }
        

        $morto->endereco()->associate($endereco_morto)->save();
        $morto->medico()->associate($medico)->save();
        $morto->cartorio()->associate($cartorio)->save();
        $morto->ocorrencia()->create((array) $dados_ocorrencia);
        $morto->ocorrencia->endereco()->associate($endereco_ocorrencia)->save();
        $morto->causa_externa()->create((array) $dados_causa_externa);
        $morto->causa_externa->endereco()->associate($endereco_causa_externa)->save();
        $morto->causa_obito()->create((array) $dados_causa_obito);


        if($morto->causa_obito) {
            if(count($dados_causas_mortes) > 0) {
                foreach($dados_causas_mortes as $causa_morte) {
                    $morto->causa_obito->causas_mortes()->create((array) $causa_morte);
                }
            }
        }

        if(isset($dados_mae))
            $morto->mae()->create((array) $dados_mae);
        
        if(isset($dados_filho_da_mae))
            $morto->mae->filho()->create((array) $dados_filho_da_mae);

        return response($morto, 201);
    }

    public function show($id)
    {
        return response(PericiandoMorto::findOrFail($id), 201);
    }

    public function update(Request $request, $id)
    {
        $morto = PericiandoMorto::findOrFail($id);

        // return response((array) json_decode($request->causas_mortes), 201);

      // obrigatório
      $dados_morto = json_decode($request->morto);
      $dados_ocorrencia = json_decode($request->ocorrencia);
      $dados_causa_obito = json_decode($request->causa_obito);
      $dados_causas_mortes = json_decode($request->causas_mortes);
      $dados_cartorio = json_decode($request->cartorio);
      $dados_medico = json_decode($request->medico);
      // situacional
      if($request->mae) {
          $dados_mae = json_decode($request->mae);
          $dados_filho_da_mae = $dados_mae->filho;
      }
      
      $dados_causa_externa = json_decode($request->causa_externa);

      $morto->fill((array) $dados_morto)->save();
    //   if($request->morto->foto[0]) {
    //     if($morto->foto)
    //         removeImg($morto->foto);
            
    //     $morto->foto = uploadImg($request->morto->foto[0], 'images/periciandos_mortos/profile_pictures');
    //     $morto->save();
    // }
      $morto->endereco->fill((array) $dados_morto->endereco)->save();
      $morto->medico->fill((array) $dados_medico)->save();
      $morto->cartorio->fill((array) $dados_cartorio)->save();
      $morto->ocorrencia->fill((array) $dados_ocorrencia)->save();
      $morto->ocorrencia->endereco->fill((array) $dados_ocorrencia->endereco)->save();
      $morto->causa_externa->fill((array) $dados_causa_externa)->save();
      $morto->causa_externa->endereco->fill((array) $dados_causa_externa->endereco)->save();
      $morto->causa_obito->fill((array) $dados_causa_obito)->save();

      if($morto->causa_obito) {
          if(count($dados_causas_mortes) > 0) {
              foreach($dados_causas_mortes as $causa_morte) {
                    if(isset($causa_morte->id)){
                        $causa_morte_model = CausaMorte::find($causa_morte->id);
                        $causa_morte_model->fill((array) $causa_morte)->save();
                    }
                    else
                        $morto->causa_obito->causas_mortes()->create((array) $causa_morte);
              }
          }
      }

      if(isset($dados_mae))
          $morto->mae()->update((array) $dados_mae);
      
      if(isset($dados_filho_da_mae))
          $morto->mae->filho()->update((array) $dados_filho_da_mae);

      return response($morto, 201);
    }

    public function destroy($id)
    {
        //
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
