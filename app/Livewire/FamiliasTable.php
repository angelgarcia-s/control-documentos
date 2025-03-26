<?php

namespace App\Livewire;

use App\Models\FamiliaProducto;
use App\Livewire\TablaGenerica;

class FamiliasTable extends TablaGenerica
{
    public function mount($modelo = FamiliaProducto::class, $columnas = [], $acciones = [], $relaciones = [], $botones = [])
    {
        $modelo = FamiliaProducto::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
            ['name' => 'productos_count', 'label' => 'Productos', 'sortable' => true, 'searchable' => false], // Opcional
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = ['productos']; // Si no hay relaciones, déjarlo vacío
        $botones = [
            ['ruta' => 'familias.show', 'parametro' => 'familia', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('familias.edit', $id);
    }

    public function borrar($id)
    {
         $this->confirmingDelete = $id;
    }
}
