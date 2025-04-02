<?php

namespace App\Livewire;

use App\Models\Tamano;

class TamanosTable extends TablaGenerica
{
    public function mount($modelo = Tamano::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $modelo = Tamano::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
            ['name' => 'productos_count', 'label' => 'Productos', 'sortable' => true, 'searchable' => false],
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = ['productos'];
        $relacionesBloqueantes = ['productos'];
        $botones = [
            ['ruta' => 'tamanos.show', 'parametro' => 'tamano', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $relacionesBloqueantes, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('tamanos.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}