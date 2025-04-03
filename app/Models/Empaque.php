<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empaque extends Model
{
    protected $table = 'empaques';
    protected $fillable = ['nombre'];
}