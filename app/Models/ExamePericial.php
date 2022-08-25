<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamePericial extends Model
{
    use HasFactory;

    protected $table = 'exames_periciais';

    protected $fillable = [
        'id_manual',
        'tipo',
        'pericia_id'
    ];
    
    protected $casts = [
    ];

    public function protocolo_pericia()
    {
        return $this->belongsTo(ProtocoloPericia::class);
    }
}
