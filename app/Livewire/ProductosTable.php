<?php

namespace App\Livewire;

use App\Models\Producto;

class ProductosTable extends TablaGenerica
{
    public function mount()
    {
        parent::mount(
            modelo: Producto::class,
            columnas: [
                ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
                ['name' => 'sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true],
                ['name' => 'id_familia', 'label' => 'Familia', 'sortable' => true, 'searchable' => true, 'relationship' => 'familia'],
                ['name' => 'producto', 'label' => 'Producto', 'sortable' => true, 'searchable' => true],
                ['name' => 'id_color', 'label' => 'Color', 'sortable' => true, 'searchable' => true, 'relationship' => 'colores'],
                ['name' => 'id_tamano', 'label' => 'Tamaño', 'sortable' => true, 'searchable' => true, 'relationship' => 'tamanos'],
                ['name' => 'multiplos_master', 'label' => 'Múltiplos Master', 'sortable' => true, 'searchable' => true],
                ['name' => 'cupo_tarima', 'label' => 'Cupo Tarima', 'sortable' => true, 'searchable' => true],
                ['name' => 'id_proveedor', 'label' => 'Proveedor', 'sortable' => true, 'searchable' => true, 'relationship' => 'proveedor'],
            ],
            acciones: [
                'codigos' => 'Códigos de barras',
                'print' => 'PrintCards',
                'editar' => 'Editar',
                'borrar' => 'Borrar',
            ],
            relaciones: ['familia', 'proveedor', 'tamanos', 'colores']
        );
    }

    public function editar($id)
    {
        return redirect()->route('productos.edit', ['producto' => $id]);
    }

    public function codigos($id)
    {
        // Lógica para "Códigos de barras" (por implementar)
    }

    public function print($id)
    {
        // Lógica para "PrintCards" (por implementar)
    }
}