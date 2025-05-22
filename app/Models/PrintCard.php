<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_codigo_barra_id',
        'proveedor_id',
        'nombre',
        'status',
        'notas',
        'registro_sanitario',
        'fecha',
        'created_by',
    ];

    public function productoCodigoBarra()
    {
        return $this->belongsTo(ProductoCodigosBarras::class, 'producto_codigo_barra_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function revisiones()
    {
        return $this->hasMany(PrintCardRevision::class);
    }
}
