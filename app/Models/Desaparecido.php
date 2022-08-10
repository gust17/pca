<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'boletim_ocorrencia_id',
        'notificante_desaparecido_id',
    ];
    
    protected $casts = [
    ];

    protected $with = [
        'boletim_ocorrencia',
        'notificante_desaparecido'
    ];

    protected $hidden = [
    ];

    public function boletim_ocorrencia() 
    {
        return $this->belongsTo(BoletimOcorrencia::class);
    }

    public function notificante_desaparecido() 
    {
        return $this->belongsTo(NotificanteDesaparecido::class);
    }
}
