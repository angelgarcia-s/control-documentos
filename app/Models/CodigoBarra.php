<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodigoBarra extends Model
{
    protected $table = 'codigos_barras';
    protected $fillable = [
        'codigo',
        'nombre',
        'tipo_empaque',
        'empaque',
        'contenido',
        'tipo',
        'color_id',
        'tamano_id',
        'nombre_corto'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_codigos_barras', 'codigo_barra_id', 'producto_id')
                    ->withPivot('tipo_empaque', 'contenido');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function tamano()
    {
        return $this->belongsTo(Tamano::class, 'tamano_id');
    }
}
