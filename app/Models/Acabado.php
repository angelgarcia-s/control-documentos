<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acabado extends Model
{
    use HasFactory;

    protected $table = 'acabados';

    protected $fillable = ['nombre'];
}
