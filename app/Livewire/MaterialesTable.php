<?php

namespace App\Livewire;

use App\Models\Material;

class MaterialesTable extends TablaGenerica
{
    public function mount($modelo = Material::class, $columnas = [], $acciones = [], $relaciones = [], $botones = [])
    {
        $modelo = Material::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = [];
        $botones = [
            ['ruta' => 'materiales.show', 'parametro' => 'material', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('materiales.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}