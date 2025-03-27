<?php

namespace App\Livewire;

use App\Models\TipoSello;

class TiposSelloTable extends TablaGenerica
{
    public function mount($modelo = TipoSello::class, $columnas = [], $acciones = [], $relaciones = [], $botones = [])
    {
        $modelo = TipoSello::class;
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
            ['ruta' => 'tipos-sello.show', 'parametro' => 'tipo_sello', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('tipos-sello.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}