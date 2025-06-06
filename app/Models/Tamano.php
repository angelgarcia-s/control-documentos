<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tamano extends Model
{
    use HasFactory;

    protected $table = 'tamanos';

    protected $fillable = ['nombre'];

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

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_tamano');
    }
}
