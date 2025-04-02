<?php

namespace App\Livewire;

use App\Models\Proveedor;
use App\Livewire\TablaGenerica;


class ProveedoresTable extends TablaGenerica
{

    public function mount($modelo = Proveedor::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $modelo = Proveedor::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
            ['name' => 'abreviacion', 'label' => 'Abreviación', 'sortable' => true, 'searchable' => true],
            ['name' => 'productos_count', 'label' => 'Productos', 'sortable' => true, 'searchable' => false], // Opcional
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = ['productos']; // Si no hay relaciones, déjarlo vacío
        $relacionesBloqueantes = ['productos'];
        $botones = [
            ['ruta' => 'proveedores.show', 'parametro' => 'proveedor', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $relacionesBloqueantes, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('proveedores.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }

}
