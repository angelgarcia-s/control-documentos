<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FamiliaProducto extends Model
{
    use HasFactory;

    protected $table = 'familia_productos';

    protected $fillable = [
        'nombre',
        'id_categoria',
        'imagen',
        'descripcion',
    ];

    // Mutador para guardar nombre en minúsculas
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtolower($value);
    }

    // Accesor para mostrar nombre con la primera letra de cada palabra en mayúsculas
    public function getNombreAttribute($value)
    {
        return Str::title($value);
    }

    // Mutador para guardar descripción en minúsculas
    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtolower($value);
    }

    // Accesor para mostrar descripción con la primera letra de cada palabra en mayúsculas
    public function getDescripcionAttribute($value)
    {
        return Str::title($value);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_familia');
    }
}
