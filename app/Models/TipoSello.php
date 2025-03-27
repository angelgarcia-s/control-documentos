<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSello extends Model
{
    use HasFactory;

    protected $table = 'tipos_sello';

    protected $fillable = ['nombre'];
}