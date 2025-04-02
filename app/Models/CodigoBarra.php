<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CodigoBarra extends Model
{
    protected $table = 'codigos_barras';

    protected $fillable = [
        'codigo',
        'nombre_corto',
        'sku',
        'producto_id',
        'tipo_empaque_id',
        'contenido',
    ];

    // Relación con Producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con Tipo de Empaque
    public function tipoEmpaque(): BelongsTo
    {
        return $this->belongsTo(TipoEmpaque::class);
    }
}