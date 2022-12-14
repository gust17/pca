<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';

    protected $fillable = [
        'tipo_endereco',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function tipoEndereco(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getTipoEndereco($value),
            set: fn ($value) => getTipoEndereco(null, $value)
        );
    }

    public function cidade(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getCidade($value),
            set: fn ($value) => getCidade(null, $value)
        );
    }

    public function periciandoVivo()
    {
        return $this->hasOne(PericiandoVivo::class);
    }

}
