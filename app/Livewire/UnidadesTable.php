<?php

namespace App\Livewire;

use App\Models\UnidadMedida;

class UnidadesTable extends TablaGenerica
{
    public function mount($modelo = UnidadMedida::class, $columnas = [], $acciones = [], $relaciones = [], $botones = [])
    {
        $modelo = UnidadMedida::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = ['productos'];
        $botones = [
            ['ruta' => 'unidades.show', 'parametro' => 'unidad', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('unidades.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}