<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        'protocolo_pericia_id',
        'protocolo_pericia_anterior_id'
    ];

    protected $casts = [
        'data_documento' => 'datetime',
        'anexos' => 'array',
    ];

    // public function setAnexosAttribute($value)
    // {
    //     $array = [];
    //     foreach($value as $anexo) {
    //         $array[] = uploadImg($anexo, 'documentacao/periciais');
    //     }

    //    $this->attributes['anexos'] = json_encode($array);
    // }

    public function tipoDocumento(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getTipoDocumentoPericia($value),
            set: fn ($value) => getTipoDocumentoPericia(null, $value)
        );
    }

    public function reiteracaoDocumento(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getPadrao($value),
            set: fn ($value) => getPadrao(null, $value)
        );
    }

    public function documentoReferencia(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getDocumentoReferencia($value),
            set: fn ($value) => getDocumentoReferencia(null, $value)
        );
    }

    public function orgao_solicitante()
    {
        return $this->belongsTo(EntidadeExterna::class, 'entidade_externa_id', 'id');
    }

    public function pessoa_solicitante()
    {
        return $this->belongsTo(User::class, 'pessoa_solicitante_id', 'id');
    }

    public function protocolo_pericia()
    {
        return $this->belongsTo(ProtocoloPericia::class);
    }

    public function protocolo_pericia_anterior()
    {
        return $this->belongsTo(ProtocoloPericia::class);
    }
}
