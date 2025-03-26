<?php

namespace App\Livewire;

use App\Models\Categoria;

class CategoriasTable extends TablaGenerica
{
    public function mount($modelo = Categoria::class, $columnas = [], $acciones = [], $relaciones = [], $botones = [])
    {
        $modelo = Categoria::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
            ['name' => 'productos_count', 'label' => 'Productos', 'sortable' => true, 'searchable' => false],
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = ['productos'];
        $botones = [
            ['ruta' => 'categorias.show', 'parametro' => 'categoria', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('categorias.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}