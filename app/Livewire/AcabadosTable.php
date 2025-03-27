<?php

namespace App\Livewire;

use App\Models\Acabado;

class AcabadosTable extends TablaGenerica
{
    public function mount($modelo = Acabado::class, $columnas = [], $acciones = [], $relaciones = [], $botones = [])
    {
        $modelo = Acabado::class;
        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ];
        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];
        $relaciones = [];
        $botones = [
            ['ruta' => 'acabados.show', 'parametro' => 'acabado', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('acabados.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}