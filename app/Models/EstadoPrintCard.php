<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPrintCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'color',
        'activo',
    ];

    public function printCards()
    {
        return $this->hasMany(PrintCard::class, 'estado_printcard_id');
    }
}
