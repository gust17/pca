<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

class ProtocoloPericia extends Model
{
    use HasFactory;

    protected $table = 'protocolos_pericias';

    protected $fillable = [
        'numero_protocolo', // formato: 00000/20XX
        'data_protocolo',
        'hora_protocolo' ,
        'usuario_receptor_id',
        'tipo_pericia',
    ];
    
    protected $casts = [
        'data_protocolo' => 'datetime',
        'hora_protocolo' => 'datetime'
    ];

    protected $with = [
        'receptor_solicitacao',
        'documento_pericial.orgao_solicitante',
        'documento_pericial.pessoa_solicitante',
        'documento_referencia',
        'exames_periciais',
        'materiais_pericias'
    ];

    protected function numeroProtocolo(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => codeMaker($this->getNextId())
        );
    }

    protected function tipoPericia(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getTipoPericia($value),
            set: fn ($value) => getTipoPericia(null, $value)
        );
    }

    public function getNextId() 
    {
        $statement = DB::select("show table status like 'protocolos_pericias'");

        return $statement[0]->Auto_increment;
    }

    public function documento_pericial()
    {
        return $this->hasOne(DocumentoPericial::class);
    }

    public function documento_referencia()
    {
        return $this->hasOne(DocumentoReferencia::class);
    }

    public function materiais_pericias()
    {
        return $this->hasMany(MaterialPericia::class);
    }

    public function exames_periciais()
    {
        return $this->hasMany(ExamePericial::class);
    }

    public function receptor_solicitacao()
    {
        return $this->belongsTo(User::class, 'usuario_receptor_id', 'id');
    }
}
