<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilhoMaePericiandoMorto extends Model
{
    use HasFactory;

    protected $table = 'filho_mae_periciando_mortos';

    protected $fillable = [
        'nascido_vivo',
        'perda_fetal',
        'semanas_gestacao',
        'tipo_parto',
        'morte_parto',
        'peso_nascimento',
        'certidao_nascimento',
        'mae_periciando_morto_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
