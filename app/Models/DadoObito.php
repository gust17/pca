<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DadoObito extends Model
{
    use HasFactory;

    protected $table = 'dados_obitos';

    protected $fillable = [
        'data_entrada_dml',
        'hora_entrada_dml',
        'data_obito',
        'hora_obito',
        'natureza_obito',
        'objeto_causa_obito',
        'obito_mulher_idade_fertil',
        'obito_mulher_idade_fertil_momento',
        'assistencia_durante_doenca',
        'diagnostico_confirmado_necropsia',
        'periciando_morto_id',
    ];

    protected $with = [
        'causas_mortes',
    ];

    protected $casts = [
        'data_entrada_dml' => 'datetime',
        'data_obito' => 'datetime',
        'hora_entrada_dml' => 'datetime',
        'hora_obito' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function dataObito(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => formatDate($value, 'Y-m-d')
        );
    }

    protected function dataEntradaDml(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => formatDate($value, 'Y-m-d')
        );
    }

    // protected function horaEntradaDml(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => now()
    //     );
    // }

    // protected function horaObito(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => now()
    //     );
    // }

    public function causas_mortes()
    {
        return $this->hasMany(CausaMorte::class);
    }

}
