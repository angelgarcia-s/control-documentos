<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEmpaque extends Model
{
    use HasFactory;

    protected $table = 'tipos_empaque';

    protected $fillable = ['orden','nombre'];



}
