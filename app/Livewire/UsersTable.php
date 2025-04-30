<?php

namespace App\Livewire;

use App\Models\User;


class UsersTable extends TablaGenerica
{
    public function mount($modelo = User::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $modelo = User::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'name', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
            ['name' => 'email', 'label' => 'e-mail', 'sortable' => true, 'searchable' => true],
            ['name' => 'roles', 'label' => 'Rol', 'sortable' => true, 'searchable' => true],
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = ['roles'];
        $relacionesBloqueantes = [];
        $botones = [
            ['ruta' => 'usuarios.show', 'parametro' => 'user', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $relacionesBloqueantes, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('usuarios.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}
