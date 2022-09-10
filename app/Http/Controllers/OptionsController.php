<?php

namespace App\Http\Controllers;

use App\Models\UsuarioPerfil;
use App\Models\User;
use App\Models\EntidadeExterna;
use App\Models\ProtocoloPericia;
use App\Models\SolicitanteExterno;
use App\Models\ServidorPublico;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function optionsEstadoCivil() 
    {
        return getEstadoCivil();
    } 

    public function optionsFormacaoProfissional() 
    {
        return getFormacaoProfissional();
    }

    public function optionsTipoEndereco() 
    {
        return getTipoEndereco();
    }
    
    public function optionsCidade() 
    {
        return getCidade();
    }
    
    public function optionsUF() 
    {
        return getUF();
    }
    
    public function optionsOrientacaoSexual() 
    {
        return getOrientacaoSexual();
    }
    
    public function optionsTipoObito() 
    {
        return getTipoObito();
    }
    
    public function optionsSexo() 
    {
        return getSexo();
    }
    
    public function optionsCor() 
    {
        return getCor();
    }
    
    public function optionsEscolaridade() 
    {
        return getEscolaridade();
    }
    
    public function optionsLocalObito() 
    {
        return getLocalObito();
    }
    
    public function optionsPadrao() 
    {
        return getPadrao();
    }
    
    public function optionsTipoGravidez() 
    {
        return getTipoGravidez();
    }
    
    public function optionsTipoParto() 
    {
        return getTipoParto();
    }
    
    public function optionsMorteParto() 
    {
        return getMorteParto();
    }
    
    public function optionsNaturezaObito() 
    {
        return getNaturezaObito();
    }
    
    public function optionsMomentoMorteMulher() 
    {
        return getMomentoMorteMulher();
    }
    
    public function optionsTipoCausaExternaObito() 
    {
        return getTipoCausaExternaObito();
    }
    
    public function optionsFonteInformacaoObito() 
    {
        return getFonteInformacaoObito();
    }

    public function optionsTipoSanguineo() 
    {
        return getTipoSanguineo();
    }

    public function optionsBiotipo() 
    {
        return getBiotipo();
    }

    public function optionsCorOlho() 
    {
        return getCorOlho();
    }

    public function optionsTipoCabelo() 
    {
        return getTipoCabelo();
    }

    public function optionsCorCabelo() 
    {
        return getCorCabelo();
    }

    public function optionsCorteCabelo() 
    {
        return getCorteCabelo();
    }

    public function optionsTipoDocumento() 
    {
        return getTipoDocumento();
    }

    public function optionsGrauParentesco() 
    {
        return getGrauParentesco();
    }

    public function optionsCondicaoPessoa() 
    {
        return getCondicaoPessoa();
    }

    public function optionsTipoDocumentoPericia() 
    {
        return getTipoDocumentoPericia();
    }

    public function optionsTipoPericia() 
    {
        return getTipoPericia();
    }

    public function optionsDocumentoReferencia() 
    {
        return getDocumentoReferencia();
    }

    public function optionsCategoriaMaterial() 
    {
        return getCategoriaMaterial();
    }

    public function optionsTipoMaterial() 
    {
        return getTipoMaterial();
    }

    public function optionsUnidadeMedida() 
    {
        return getUnidadeMedida();
    }

    public function optionsPais() 
    {
        return getPais();
    }

    public function optionsPerfilUsuario() 
    {
        $options =  UsuarioPerfil::select('id as value', 'nome as text')->get();

        return response($options, 201);
    }

    public function optionsEntidadeExterna() 
    {
        $options =  EntidadeExterna::select(
            'id as value', 
            DB::raw("CONCAT(sigla, ' - ', nome) as text")
        )->get();

        return response($options, 201);
    }

    public function optionsPessoa() 
    {
        $solicitantes_externos = SolicitanteExterno::whereDoesntHave('user')->get();
        $servidores_publicos = ServidorPublico::whereDoesntHave('user')->get();

        $options = [];

        foreach($solicitantes_externos as $solicitante_externo) {
            $options[] = [
                'value' => [
                    'id' => $solicitante_externo->id,
                    'model' => 'solicitante-externo'
                ],
                'text' => $solicitante_externo->nome . ' - '. $solicitante_externo->cpf,
                'group' => 'Solicitante Externo'
            ];
        }

        foreach($servidores_publicos as $servidor_publico) {
            $options[] = [
                'value' => [
                    'id' => $servidor_publico->id,
                    'model' => 'servidor-publico'
                ],
                'text' => $servidor_publico->nome . ' - '. $servidor_publico->cpf,
                'group' => 'Servidor Público'
            ];
        }

        return response($options, 201);
    }

    public function optionsUsuario() 
    {
        $users = User::all();

        foreach($users as $user) {
            $options[] = [
                'value' => $user->id,
                'text' => $user->name . ' - '. $user->email,
                'group' => $user->type
            ];
        }

        return response($options, 201);
    }

    public function optionsProtocoloPericia() 
    {
        $options =  ProtocoloPericia::select(
            'id as value', 
            'numero_protocolo as text'
        )->get();

        return response($options, 201);
    }
}
