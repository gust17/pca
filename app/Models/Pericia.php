<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pericia extends Model
{
    use HasFactory;

    protected $table = 'pericias';

    protected $fillable = [
        'material',
        'numero_requisicao',
        'ano_requisicao',
        'status_solicitacao',
        'motivo_rejeicao',
        'numero_protocolo',
        'data_hora_protocolo',
        'numero_caso',
        'dados_usuario_protocolo',
        'protocolo_id',
    ];
    
    protected $casts = [
        'data_hora_protocolo' => 'datetime',
    ];

    public function protocolo()
    {
        return $this->belongsTo(Protocolo::class);
    }
}
