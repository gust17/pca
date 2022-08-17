<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class NotificanteDesaparecido extends Model
{
    use HasFactory;

    protected $table = 'notificantes_desaparecidos';

    protected $fillable = [
        'nome',
        'tipo_documento',
        'numero_documento',
        'grau_parentesco',
        'email',
        'outro',
        'numero_telefone',
        'endereco_id',
    ];

    protected $casts = [
    ];

    protected $with = [
        'endereco'
    ];

    protected function tipoDocumento(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getTipoDocumento($value)
        );
    }

    protected function grauParentesco(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getGrauParentesco($value)
        );
    }


    public function endereco() 
    {
        return $this->belongsTo(Endereco::class);
    }
}
