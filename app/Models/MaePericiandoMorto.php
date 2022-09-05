<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MaePericiandoMorto extends Model
{
    use HasFactory;

    protected $table = 'maes_periciandos_mortos';

    protected $fillable = [
        'data_nascimento',
        'escolaridade',
        'ocupacao',
        'codigo_cbo',
        'periciando_morto_id'
    ];

    protected $casts = [
        'data_nascimento' => 'datetime'
    ];

    protected $with = [
        'filho'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    protected function dataNascimento(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => formatDate($value, 'Y-m-d')
        );
    }

    public function periciando_morto()
    {
        return $this->belongsTo(PericiandoMorto::class);
    }

    public function filho()
    {
        return $this->hasOne(FilhoMaePericiandoMorto::class);
    }
}
