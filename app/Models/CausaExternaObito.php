<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CausaExternaObito extends Model
{
    use HasFactory;

    protected $table = 'causa_externa_obitos';

    protected $fillable = [
        'tipo',
        'acidente_trabalho',
        'fonte_informacao',
        'descricao_evento',
        'lugar_ocorrencia',
        'endereco_id',
        'periciando_morto_id',
    ];

    protected $with = [
        'endereco',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
