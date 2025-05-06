<?php

namespace App\Livewire;

use Spatie\Permission\Models\Permission;

class PermisosTable extends TablaGenerica
{
    public function mount($modelo = Permission::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        // Reiniciamos confirmingDelete al montar para evitar valores residuales
        $this->confirmingDelete = null;
        $this->selectedActions = []; // Reiniciamos al montar

        parent::mount(
            modelo: $modelo,
            columnas: $columnas ?: [
                ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
                ['name' => 'name', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
                ['name' => 'description', 'label' => 'Descripción', 'sortable' => true, 'searchable' => true],
                ['name' => 'category', 'label' => 'Categoría', 'sortable' => true, 'searchable' => true],
            ],
            acciones: $acciones ?: [
                'editar' => 'Editar',
            ],
            relaciones: $relaciones ?: [],
            relacionesBloqueantes: $relacionesBloqueantes ?: [],
            botones: $botones ?: []
        );
    }

    public function editar($id)
    {
        return redirect()->route('permisos.edit', ['permission' => $id]);
    }
}
