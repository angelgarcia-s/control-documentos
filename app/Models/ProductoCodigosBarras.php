<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductoCodigosBarras extends Model
{
    protected $table = 'producto_codigos_barras';

    protected $fillable = ['producto_id', 'codigo_barra_id', 'clasificacion_envase', 'contenido'];

    // Mutadores para guardar en minúsculas
    public function setClasificacionEnvaseAttribute($value)
    {
        $this->attributes['clasificacion_envase'] = strtolower($value);
    }

    public function setContenidoAttribute($value)
    {
        $this->attributes['contenido'] = $value ? strtolower($value) : null;
    }

    // Accesores para mostrar con la primera letra de cada palabra en mayúsculas
    public function getClasificacionEnvaseAttribute($value)
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
