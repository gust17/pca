<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CausaMorte extends Model
{
    use HasFactory;

    protected $table = 'causa_mortes';

    protected $fillable = [
        'causador_principal_morte',
        'estados_morbidos',
        'motivacao_morte',
        'tempo_doenca_morte',
        'dado_obito_id',
    ];

    protected $casts = [
        'tempo_doenca_morte' => 'datetime'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // protected function tempoDoencaMorte(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => formatDate($value, 'Y-m-d')
    //     );
    // }
}
