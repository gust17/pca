<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Cartorio extends Model
{
    use HasFactory;

    protected $table = 'cartorios';

    protected $fillable = [
        'cartorio',
        'codigo',
        'registro',
        'data',
        'cidade',
        'uf'
    ];

    protected $casts = [
        'data' => 'datetime'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // protected function data(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => formatDate($value, 'Y-m-d')
    //     );
    // }
}
