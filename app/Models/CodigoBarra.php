<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoBarra extends Model
{
    use HasFactory;

    protected $table = 'codigos_barras';

    protected $fillable = [
        'producto_id',
        'tipo_empaque_id',
        'tipo_codigo',
        'codigo_barra',
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
