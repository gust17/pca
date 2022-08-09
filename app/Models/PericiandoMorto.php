<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PericiandoMorto extends Model
{
    use HasFactory;

    protected $table = 'periciandos_mortos';

    protected $fillable = [
            'identificado',
            'data_obito',
            'cartao_sus',
            'naturalidade',
            'nome',
            'nome_pai',
            'nome_mae',
            'data_nascimento',
            'sexo',
            'cor',
            'estado_civil',
            'escolaridade',
            'ocupacao',
            'codigo_cbo',
            'foto',
            'endereco_id',
            'medico_id',
            'cartorio_id',
            'tipo_medico_atestado',
            'cidade',
            'uf',
            'data_atestado',
            'observacoes',
            'rg',
            'cpf',
            'documentacao'
    ];
    
    protected $casts = [
        'data_obito' => 'datetime',
        'data_nascimento' => 'datetime',
        'data_atestado' => 'datetime',
        'documentacao' => 'array'
    ];

    protected $with = [
        'endereco',
        'medico',
        'cartorio',
        'ocorrencia',
        'causa_obito',
        'mae',
        'causa_externa'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function foto(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => count($value) == 0 ? null : ''
        );
    }

    protected function dataObito(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => formatDate($value, 'Y-m-d')
        );
    }

    protected function data_nascimento(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => formatDate($value, 'Y-m-d')
        );
    }

    protected function dataAtestado(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => formatDate($value, 'Y-m-d')
        );
    }
    
    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function cartorio()
    {
        return $this->belongsTo(Cartorio::class);
    }

    public function mae()
    {
        return $this->hasOne(MaePericiandoMorto::class);
    }

    public function ocorrencia()
    {
        return $this->hasOne(OcorrenciaObito::class);
    }

    public function causa_obito()
    {
        return $this->hasOne(DadoObito::class);
    }

    public function causa_externa()
    {
        return $this->hasOne(CausaExternaObito::class);
    }
}
