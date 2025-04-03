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
        'tipo'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_codigos_barras', 'codigo_barra_id', 'producto_id')
                    ->withPivot('tipo_empaque', 'contenido');
    }
}