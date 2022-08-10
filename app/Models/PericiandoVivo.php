<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PericiandoVivo extends Model
{
    use HasFactory;

    protected $table = 'periciandos_vivos';

    protected $fillable = [
        'cartao_sus',
        'naturalidade',
        'nome',
        'nome_pai',
        'nome_mae',
        'cpf',
        'rg',
        'data_nascimento',
        'hora_nascimento',
        'idade',
        'sexo',
        'cor',
        'tipo_sanguineo',
        'altura',
        'biotipo',
        'cor_olho',
        'tipo_cabelo',
        'cor_cabelo',
        'marca_cicatriz',
        'estado_civil',
        'escolaridade',
        'ocupacao',
        'codigo_cbo',
        'foto',
        'endereco_id',
        'documentacao'
    ];
    
    protected $casts = [
        'data_nascimento' => 'datetime',
        'hora_nascimento' => 'datetime',
        'documentacao' => 'array'
    ];

    protected $with = [
        'endereco'
    ];

    protected $hidden = [
    ];

    protected function naturalidade(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getCidade($value)
        );
    }

    protected function sexo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getSexo($value)
        );
    }

    protected function cor(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getCor($value)
        );
    }

    protected function tipoSanguineo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getTipoSanguineo($value)
        );
    }

    protected function biotipo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getBiotipo($value)
        );
    }

    protected function corOlho(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getCorOlho($value)
        );
    }

    protected function tipoCabelo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getTipoCabelo($value)
        );
    }

    protected function corCabelo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getCorCabelo($value)
        );
    }

    protected function estadoCivil(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getEstadoCivil($value)
        );
    }

    protected function escolaridade(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getEscolaridade($value)
        );
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
