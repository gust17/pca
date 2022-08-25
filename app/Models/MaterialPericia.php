<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MaterialPericia extends Model
{
    use HasFactory;

    protected $table = 'materiais_periciais';

    protected $fillable = [
        'numero_material',
        'numero_lacre',
        'categoria_material',
        'tipo_material',
        'caracteristicas_gerais_material',
        'qtd_material',
        'unidade_medida',
        'pericia_id',
    ];
    
    protected $casts = [
    ];

    protected function numeroMaterial(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => codeMaker($this->getNextId())
        );
    }

    public function getNextId() 
    {
        $statement = DB::select("show table status like 'materiais_periciais'");

        return $statement[0]->Auto_increment;
    }

    public function pericia()
    {
        return $this->belongsTo(Pericia::class);
    }
}
