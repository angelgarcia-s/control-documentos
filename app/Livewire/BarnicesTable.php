<?php

namespace App\Livewire;

use App\Models\Barniz;

class BarnicesTable extends TablaGenerica
{
    public function mount($modelo = Barniz::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $modelo = Barniz::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = [];
        $relacionesBloqueantes = [];
        $botones = [
            ['ruta' => 'barnices.show', 'parametro' => 'barniz', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $relacionesBloqueantes, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('barnices.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}