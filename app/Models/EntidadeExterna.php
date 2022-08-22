<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntidadeExterna extends Model
{
    use HasFactory;

    protected $table = 'entidades_externas';

    protected $fillable = [
        'nome',
        'sigla',
        'numero_telefone',
        'email',
        'nome_representante',
        'endereco_id',
    ];

    protected $with = [
        'endereco',
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
