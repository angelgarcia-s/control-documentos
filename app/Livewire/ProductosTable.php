<?php

namespace App\Livewire;

use App\Models\Producto;

class ProductosTable extends TablaGenerica
{
    public function mount($modelo = Producto::class, $columnas = [], $acciones = [], $relaciones = [], $botones = [])
    {
        // Reiniciamos confirmingDelete al montar para evitar valores residuales
        $this->confirmingDelete = null;
        $this->selectedActions = []; // Reiniciamos al montar
        
        parent::mount(
            modelo: $modelo,
            columnas: $columnas ?: [
                ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
                ['name' => 'sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true],
                ['name' => 'nombre_corto', 'label' => 'Nombre Corto', 'sortable' => true, 'searchable' => true],
                ['name' => 'id_familia', 'label' => 'Familia', 'sortable' => true, 'searchable' => true, 'relationship' => 'familia'],
                ['name' => 'id_color', 'label' => 'Color', 'sortable' => true, 'searchable' => true, 'relationship' => 'color'],
                ['name' => 'id_tamano', 'label' => 'Tamaño', 'sortable' => true, 'searchable' => true, 'relationship' => 'tamano'],
                ['name' => 'multiplos_master', 'label' => 'Múltiplos Master', 'sortable' => true, 'searchable' => true],
                ['name' => 'cupo_tarima', 'label' => 'Cupo Tarima', 'sortable' => true, 'searchable' => true],
                ['name' => 'id_proveedor', 'label' => 'Proveedor', 'sortable' => true, 'searchable' => true, 'relationship' => 'proveedor'],
            ],
            acciones: $acciones ?: [
                'codigos' => 'Códigos de barras',
                'printcards' => 'PrintCards',
                'editar' => 'Editar',
                'borrar' => 'Borrar',
            ],
            relaciones: $relaciones ?: ['familia', 'proveedor', 'tamano', 'color'],
            botones: $botones ?: [
                ['etiqueta' => 'Ver', 'ruta' => 'productos.show', 'parametro' => 'producto', 'estilo' => 'primary'],
            ]
        );
    }

    public function borrar($id)
    {
        $this->confirmarEliminar($id);
            
    }

    public function editar($id)
    {
        return redirect()->route('productos.edit', ['producto' => $id]);
    }

    public function codigos($id)
    {
        // Lógica para "Códigos de barras" (por implementar)
    }

    public function printcards($id)
    {
        // Lógica para "PrintCards" (por implementar)
    }
}