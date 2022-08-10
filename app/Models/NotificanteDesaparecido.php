<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificanteDesaparecido extends Model
{
    use HasFactory;

    protected $table = 'notificantes_desaparecidos';

    protected $fillable = [
        'nome',
        'tipo_documento',
        'numero_documento',
        'grau_parentesco',
        'outro',
        'numero_telefone',
        'endereco_id',
    ];

    protected $casts = [
    ];

    protected $with = [
        'endereco'
    ];

    public function endereco() 
    {
        return $this->belongsTo(Endereco::class);
    }
}
