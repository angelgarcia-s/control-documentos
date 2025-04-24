<?php

namespace App\Livewire;

use App\Models\TipoEmpaque;

class TiposEmpaqueTable extends TablaGenerica
{
    public function mount($modelo = TipoEmpaque::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $modelo = TipoEmpaque::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'orden', 'label' => 'Orden', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = [];
        $relacionesBloqueantes = [];
        $botones = [
            ['ruta' => 'tipos-empaque.show', 'parametro' => 'tipo_empaque', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $relacionesBloqueantes, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('tipos-empaque.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}
