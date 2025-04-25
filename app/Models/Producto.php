<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'sku',
        'descripcion',
        'id_categoria',
        'id_familia',
        'id_tamano',
        'id_color',
        'id_proveedor',
        'id_unidad_medida',
        'multiplos_master',
        'nombre_corto',
        'cupo_tarima',
        'requiere_peso',
        'peso',
        'variacion_peso'
    ];

    // Mutadores para guardar en minúsculas
    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtolower($value);
    }

    public function setNombreCortoAttribute($value)
    {
        $this->attributes['nombre_corto'] = strtolower($value);
    }

    // Accesores para mostrar con la primera letra de cada palabra en mayúsculas
    public function getDescripcionAttribute($value)
    {
        return Str::title($value);
    }

    public function getNombreCortoAttribute($value)
    {
        return Str::title($value);
    }

    // Relaciones
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function familia()
    {
        return $this->belongsTo(FamiliaProducto::class, 'id_familia');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function tamano()
    {
        return $this->belongsTo(Tamano::class, 'id_tamano');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'id_color');
    }

    public function unidadMedida()
    {
        return $this->belongsTo(UnidadMedida::class, 'id_unidad_medida');
    }

    public function printcards()
    {
        return $this->hasMany(PrintCard::class, 'producto_id');
    }

    public function codigosBarras()
    {
        return $this->belongsToMany(CodigoBarra::class, 'producto_codigos_barras', 'producto_id', 'codigo_barra_id')
                    ->withPivot('tipo_empaque', 'contenido');
    }
}
