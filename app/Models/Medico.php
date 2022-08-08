<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $fillable = [
        'nome',
        'crm',
        'telefone',
        'email',
        'cidade',
        'uf',
    ];


    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
