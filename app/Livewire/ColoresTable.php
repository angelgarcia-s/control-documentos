<?php

namespace App\Livewire;

use App\Models\Color;

class ColoresTable extends TablaGenerica
{
    public function mount($modelo = Color::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $modelo = Color::class;
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
        $relacionesBloqueantes = ['productos'];
        $botones = [
            ['ruta' => 'colores.show', 'parametro' => 'color', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $relacionesBloqueantes, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('colores.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}