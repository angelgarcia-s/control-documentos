<?php

namespace App\Livewire;

use Spatie\Permission\Models\Role;

class RolesTable extends TablaGenerica
{
    public function mount($modelo = Role::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $modelo = Role::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'name', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = [];
        $relacionesBloqueantes = ['users']; // No se puede eliminar un rol si está asignado a usuarios
        $botones = [
            ['ruta' => 'roles.show', 'parametro' => 'role', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $relacionesBloqueantes, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('roles.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
        $this->dispatch('abrir-modal', 'eliminar-elemento');
    }
}
