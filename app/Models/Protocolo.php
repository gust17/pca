<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

class Protocolo extends Model
{
    use HasFactory;

    protected $table = 'protocolos';

    protected $fillable = [
        'id',
        'numero_protocolo', // formato: 00000/20XX
        'data_protocolo',
        'hora_protocolo' ,
        'usuario_receptor_id'
    ];
    
    protected $casts = [
        'data_protocolo' => 'datetime',
        'hora_protocolo' => 'datetime'
    ];

    protected function numeroProtocolo(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => codeMaker($this->getNextId())
        );
    }

    public function getNextId() 
    {
        $statement = DB::select("show table status like 'protocolos'");

        return $statement[0]->Auto_increment;
    }
}
