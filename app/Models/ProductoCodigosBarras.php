<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoCodigosBarras extends Model
{
    protected $table = 'producto_codigos_barras';
    protected $fillable = ['producto_id', 'codigo_barra_id', 'tipo_empaque', 'contenido'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function codigoBarras()
    {
        return $this->belongsTo(CodigoBarra::class, 'codigo_barra_id');
    }
}