<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PrintCard extends Model
{
    use HasFactory;

    protected $table = 'printcards';

    protected $fillable = [
        'producto_id',
        'tipo_empaque_id',
        'codigo_especifico',
        'fecha_manual',
        'codigo_barra',
        'revision',
        'estado'
    ];

    // Mutador para guardar estado en minúsculas
    public function setEstadoAttribute($value)
    {
        $this->attributes['estado'] = strtolower($value);
    }

    // Accesor para mostrar estado con la primera letra de cada palabra en mayúsculas
    public function getEstadoAttribute($value)
    {
        return Str::title($value);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function tipoEmpaque()
    {
        return $this->belongsTo(TipoEmpaque::class, 'tipo_empaque_id');
    }
}
