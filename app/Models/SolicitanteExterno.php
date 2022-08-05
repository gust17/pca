<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitanteExterno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'data_nascimento',
        'nacionalidade',
        'instituicao',
        'area_atuacao',
        'numero_telefone',
        'numero_celular',
        'email',
        'documentacao'
    ];

    protected $casts = [
        'documentacao' => 'array'
    ];
}
