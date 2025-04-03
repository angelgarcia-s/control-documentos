<?php

namespace App\Http\Livewire;

use App\Models\CodigoBarra;
use App\Livewire\TablaGenerica;

class CodigosBarrasTable extends TablaGenerica
{
    public function mount($modelo = CodigoBarra::class, $columnas = [], $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $this->confirmingDelete = null;
        $this->selectedActions = [];
        
        parent::mount(
            modelo: $modelo,
            columnas: $columnas ?: [
                ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
                ['name' => 'codigo', 'label' => 'Código', 'sortable' => true, 'searchable' => true],
                ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
                ['name' => 'tipo_empaque', 'label' => 'Tipo de Empaque', 'sortable' => true, 'searchable' => true],
                ['name' => 'contenido', 'label' => 'Contenido', 'sortable' => true, 'searchable' => true],
                ['name' => 'tipo', 'label' => 'Tipo', 'sortable' => true, 'searchable' => true],
                ['name' => 'productos_count', 'label' => 'Productos', 'sortable' => true, 'searchable' => false],
            ],
            acciones: $acciones ?: [
                'editar' => 'Editar',
                'borrar' => 'Borrar',
            ],
            relaciones: $relaciones ?: ['productos'],
            relacionesBloqueantes: $relacionesBloqueantes ?: ['productos'],
            botones: $botones ?: [
                ['ruta' => 'codigos-barras.show', 'parametro' => 'codigoBarra', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
            ]
        );
    }

    public function editar($id)
    {
        return redirect()->route('codigos-barras.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete($id);
    }
}