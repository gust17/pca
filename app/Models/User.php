<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'name',
        'email',
        'password',
        'type',
        'password_validate',
        'photo',
        'deleted_at',
        'servidor_publico_id',
        'solicitante_externo_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_validate' => 'datetime'
    ];

    protected $appends = [
        'name'
    ];

    public function getNameAttribute()
    {
        if(isset($this->servidor_publico))
            return $this->attributes['name'] = $this->servidor_publico->nome;

        if(isset($this->solicitante_externo))
            return $this->attributes['name'] = $this->solicitante_externo->nome;

        return '';
    }

    public function type(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => UsuarioPerfil::where('id', $value)->first()->nome,
            set: fn ($value) => UsuarioPerfil::where('nome', $value)->first()->id
        );
    }

    public function servidor_publico()
    {
        return $this->belongsTo(ServidorPublico::class);
    }

    public function solicitante_externo()
    {
        return $this->belongsTo(SolicitanteExterno::class);
    }
}
