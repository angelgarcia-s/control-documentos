<?php

namespace App\Livewire;

use App\Models\Proveedor;

class ProveedoresTable extends TablaGenerica
{
    public function mount()
    {
        parent::mount(
            modelo: Proveedor::class,
            columnas: [
                ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
                ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
                ['name' => 'contacto', 'label' => 'Contacto', 'sortable' => true, 'searchable' => true],
            ],
            acciones: [
                'editar' => 'Editar',
                'borrar' => 'Borrar',
            ]
        );
    }

    public function editar($id)
    {
        return redirect()->route('proveedores.edit', ['proveedor' => $id]);
    }
}