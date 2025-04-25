<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductoCodigosBarras extends Model
{
    protected $table = 'producto_codigos_barras';

    protected $fillable = ['producto_id', 'codigo_barra_id', 'tipo_empaque', 'contenido'];

    // Mutadores para guardar en minúsculas
    public function setTipoEmpaqueAttribute($value)
    {
        $this->attributes['tipo_empaque'] = strtolower($value);
    }

    public function setContenidoAttribute($value)
    {
        $this->attributes['contenido'] = $value ? strtolower($value) : null;
    }

    // Accesores para mostrar con la primera letra de cada palabra en mayúsculas
    public function getTipoEmpaqueAttribute($value)
    {
        return Str::title($value);
    }

    public function getContenidoAttribute($value)
    {
        return $value ? Str::title($value) : null;
    }

    // Relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function codigoBarra()
    {
        return $this->belongsTo(CodigoBarra::class, 'codigo_barra_id');
    }
}
