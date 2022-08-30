<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoReferencia extends Model
{
    use HasFactory;

    protected $table = 'documentos_referencias';

    protected $fillable = [
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

    public function protocolo_pericia()
    {
        return $this->belongsTo(ProtocoloPericia::class);
    }
}
