<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Desaparecido extends Model
{
    use HasFactory;

    protected $table = 'desaparecidos';

    protected $fillable = [
        'nome',
        'apelido',
        'cpf',
        'uf',
        'cidade',
        'condicao',
        'fotos',
        'observacoes',
        'encontrado',
        'bo',
        'boletim_ocorrencia_id',
        'termo_consentimento_falsa_comunicacao',
        'notificante_desaparecido_id',
    ];
    
    protected $casts = [
        'fotos' => 'array'
    ];

    protected $with = [
        'boletim_ocorrencia',
        'notificante_desaparecido'
    ];

    protected $hidden = [
    ];

    protected function uf(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getUF($value),
            set: fn ($value) => getUF(null, $value)
        );
    }

    protected function cidade(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getCidade($value),
            set: fn ($value) => getCidade(null, $value)
        );
    }

    protected function condicao(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getCondicaoPessoa($value),
            set: fn ($value) => getCondicaoPessoa(null, $value)
        );
    }

    protected function bo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getPadrao($value),
            set: fn ($value) => getPadrao(null, $value)
        );
    }

    protected function encontrado(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getPadrao($value),
            set: fn ($value) => getPadrao(null, $value)
        );
    }

    protected function termoConsentimentoFalsaComunicacao(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getPadrao($value),
            set: fn ($value) => getPadrao(null, $value)
        );
    }

    public function boletim_ocorrencia() 
    {
        return $this->belongsTo(BoletimOcorrencia::class);
    }

    public function notificante_desaparecido() 
    {
        return $this->belongsTo(NotificanteDesaparecido::class);
    }
}
