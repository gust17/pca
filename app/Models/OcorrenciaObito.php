<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OcorrenciaObito extends Model
{
    use HasFactory;

    protected $table = 'ocorrencias_obitos';

    protected $fillable = [
        'local',
        'estabelecimento',
        'codigo_cnes',
        'endereco_id',
        'periciando_morto_id'
    ];

    protected $with = [
        'endereco',
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function periciando_morto()
    {
        return $this->belongsTo(PericiandoMorto::class);
    }

}
