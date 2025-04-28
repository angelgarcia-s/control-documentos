<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CodigoBarra extends Model
{
    protected $table = 'codigos_barras';

    protected $fillable = [
        'codigo',
        'consecutivo_codigo',
        'nombre',
        'tipo_empaque',
        'empaque',
        'contenido',
        'tipo',
        'color_id',
        'tamano_id',
        'nombre_corto'
    ];

    // Mutadores para guardar en minúsculas
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtolower($value);
    }

    public function setTipoEmpaqueAttribute($value)
    {
        $this->attributes['tipo_empaque'] = strtolower($value);
    }

    public function setEmpaqueAttribute($value)
    {
        $this->attributes['empaque'] = $value ? strtolower($value) : null;
    }

    public function setContenidoAttribute($value)
    {
        $this->attributes['contenido'] = $value ? strtolower($value) : null;
    }

    public function setNombreCortoAttribute($value)
    {
        $this->attributes['nombre_corto'] = $value ? strtolower($value) : null;
    }

    public function setConsecutivoCodigoAttribute($value)
    {
        $this->attributes['consecutivo_codigo'] = str_pad($value, 3, '0', STR_PAD_LEFT); // Asegura que sea 3 dígitos (001, 002, etc.)
    }

    // Accesores para mostrar con la primera letra de cada palabra en mayúsculas
    public function getNombreAttribute($value)
    {
        return Str::title($value);
    }

    public function getTipoEmpaqueAttribute($value)
    {
        return Str::title($value);
    }

    public function getEmpaqueAttribute($value)
    {
        return $value ? Str::title($value) : null;
    }

    public function getContenidoAttribute($value)
    {
        return $value ? Str::title($value) : null;
    }

    public function getNombreCortoAttribute($value)
    {
        return $value ? Str::title($value) : null;
    }

    // Relaciones
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_codigos_barras', 'codigo_barra_id', 'producto_id')
                    ->withPivot('tipo_empaque', 'contenido');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function tamano()
    {
        return $this->belongsTo(Tamano::class, 'tamano_id');
    }
}
