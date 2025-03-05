<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintCard extends Model
{
    use HasFactory;

    protected $table = 'printcards';

    protected $fillable = [
        'producto_id',
        'tipo_empaque_id',
        'codigo_especifico',
        'fecha_manual',
        'codigo_barra',
        'revision',
        'estado'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function tipoEmpaque()
    {
        return $this->belongsTo(TipoEmpaque::class, 'tipo_empaque_id');
    }
}
