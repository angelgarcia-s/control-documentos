<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorEmpaque extends Model
{
    use HasFactory;

    protected $table = 'colores_empaque';

    protected $fillable = ['nombre'];
}
