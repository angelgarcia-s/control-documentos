<?php

namespace App\Livewire;

use App\Models\Empaque;

class EmpaquesTable extends TablaGenerica
{
    public function mount($modelo = Empaque::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $this->confirmingDelete = null;
        $this->selectedActions = [];
        
        parent::mount(
            modelo: $modelo,
            columnas: $columnas ?: [
                ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
                ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
            ],
            acciones: $acciones ?: [
                'editar' => 'Editar',
                'borrar' => 'Borrar',
            ],
            relaciones: $relaciones ?: [],
            relacionesBloqueantes: $relacionesBloqueantes ?: [],
            botones: $botones ?: [
                ['ruta' => 'empaques.show', 'parametro' => 'empaque', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
            ]
        );
    }

    public function editar($id)
    {
        return redirect()->route('empaques.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmarEliminar($id);
    }
}