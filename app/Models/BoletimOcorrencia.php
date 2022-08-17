<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class BoletimOcorrencia extends Model
{
    use HasFactory;

    protected $table = 'boletins_ocorrencias';

    protected $fillable = [
        'numero',
        'uf',
        'cidade'
    ];

    protected function uf(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getUF($value)
        );
    }

    protected function cidade(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => getCidade($value)
        );
    }
}
