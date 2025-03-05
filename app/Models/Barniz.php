<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barniz extends Model
{
    use HasFactory;

    protected $table = 'barnices';

    protected $fillable = ['nombre'];
}
