<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Empaque extends Model
{
    use HasFactory;

    protected $table = 'empaques';

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
}
