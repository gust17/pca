<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServidorPublico extends Model
{
    use HasFactory;

    protected $table = 'servidores_publicos';

    protected $fillable = [
        'nome',
        'matricula',
        'rg',
        'cpf',
        'data_nascimento',
        'orientacao_sexual',
        'cor',
        'nacionalidade',
        'naturalidade',
        'estado_civil',
        'lotacao',
        'grupo_trabalho',
        'area_atuacao',
        'formacao_profissional',
        'numero_telefone',
        'numero_celular',
        'email',
        'documentacao',
        'endereco_id',
        'foto'
    ];

    protected $casts = [
        'data_nascimento' => 'datetime',
        'documentacao' => 'array'
    ];

    protected $with = [
        'endereco'
    ];

    public function endereco() 
    {
        return $this->belongsTo(Endereco::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
