<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NombreVisualCategoriaPermiso extends Model
{
    use HasFactory;

    protected $table = 'nombres_visuales_categorias_permisos';

    protected $fillable = ['categoria', 'nombre_visual'];
}
