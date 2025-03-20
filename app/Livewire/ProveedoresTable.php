<?php

namespace App\Livewire;

use App\Models\Proveedor;

class ProveedoresTable extends TablaGenerica
{
    public function mount($modelo = Proveedor::class, $columnas = [], $acciones = [], $relaciones = [])
    {
        parent::mount(
            modelo: $modelo,
            columnas: $columnas ?: [
                ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
                ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
                ['name' => 'contacto', 'label' => 'Contacto', 'sortable' => true, 'searchable' => true],
            ],
            acciones: $acciones ?: [
                'editar' => 'Editar',
                'borrar' => 'Borrar',
            ],
            relaciones: $relaciones,
            botones: $botones ?: [
                ['etiqueta' => 'Ver', 'ruta' => 'proveedores.show', 'parametro' => 'proveedor', 'estilo' => 'primary'],
            ]
        );
    }

    public function editar($id)
    {
        return redirect()->route('proveedores.edit', ['proveedor' => $id]);
    }
}