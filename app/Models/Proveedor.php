<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = ['nombre', 'abreviacion'];

    // Mutadores para guardar en minúsculas
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtolower($value);
    }

    public function setAbreviacionAttribute($value)
    {
        $this->attributes['abreviacion'] = strtolower($value);
    }

    // Accesores para mostrar los valores transformados
    public function getNombreAttribute($value)
    {
        return Str::title($value);
    }

    // Mostrar abreviacion en mayúsculas completas
    public function getAbreviacionAttribute($value)
    {
        return strtoupper($value);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_proveedor', 'id');
    }
}
