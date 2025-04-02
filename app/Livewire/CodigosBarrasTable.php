<?php

namespace App\Livewire;

use App\Models\CodigoBarra;

class CodigosBarrasTable extends TablaGenerica
{
    public function mount($modelo = CodigoBarra::class, $columnas = [], $acciones = [], $relaciones = [], $botones = [])
    {
        $modelo = CodigoBarra::class;

        $columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'codigo', 'label' => 'Código de Barras', 'sortable' => true, 'searchable' => true],
            ['name' => 'sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre_corto', 'label' => 'Nombre Corto', 'sortable' => true, 'searchable' => true],
            ['name' => 'contenido', 'label' => 'Contenido', 'sortable' => true, 'searchable' => true],
            ['name' => 'tipoEmpaque.nombre', 'label' => 'Tipo de Empaque', 'sortable' => true, 'searchable' => true],
        ];

        $acciones = [
            'editar' => 'Editar',
            'borrar' => 'Borrar',
        ];

        $relaciones = ['tipoEmpaque'];

        $botones = [
            ['ruta' => 'codigos-barras.show', 'parametro' => 'codigo_barra', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
        ];

        parent::mount($modelo, $columnas, $acciones, $relaciones, $botones);
    }

    public function editar($id)
    {
        return redirect()->route('codigos-barras.edit', $id);
    }

    public function borrar($id)
    {
        $this->confirmingDelete = $id;
    }
}