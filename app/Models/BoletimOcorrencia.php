<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletimOcorrencia extends Model
{
    use HasFactory;

    protected $table = 'boletins_ocorrencias';

    protected $fillable = [
        'numero',
        'uf',
        'cidade'
    ];
}
