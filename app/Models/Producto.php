<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'sku',
        'descripcion',
        'id_familia',
        'id_tamano',
        'id_color',
        'id_proveedor',
        'id_unidad_medida',
        'multiplos_master',
        'producto',
        'nombre_corto',
        'cupo_tarima',
        'requiere_peso',
        'peso',
        'variacion_peso'
    ];

    // Relaciones
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
        return $this->hasMany(CodigoBarra::class, 'producto_id');
    }

}

