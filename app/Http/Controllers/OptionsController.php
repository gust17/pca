<?php

namespace App\Http\Controllers;

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
}
