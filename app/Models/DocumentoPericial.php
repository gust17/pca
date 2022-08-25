<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoPericial extends Model
{
    use HasFactory;

    protected $table = 'documentos_periciais';

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'data_documento',
        'documento_referencia',
        'teor_documento',
        'reiteracao_documento',
        'anexos',
        'entidade_externa_id',
        'pessoa_solicitante_id',
        'pericia_anterior_id'
    ];
    
    protected $casts = [
        'data_documento' => 'datetime',
        'anexos' => 'array',
    ];

    public function entidade_externa()
    {
        return $this->belongsTo(EntidadeExterna::class);
    }

    public function pessoa_solicitante()
    {
        return $this->belongsTo(User::class);
    }

    public function pericia_anterior()
    {
        return $this->belongsTo(Pericia::class);
    }
}
