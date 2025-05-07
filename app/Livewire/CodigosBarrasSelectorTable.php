<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CodigoBarra;
use App\Traits\HasTableFeatures;

class CodigosBarrasSelectorTable extends Component
{
    use HasTableFeatures;

    public $selectedCode;
    public $key;

    public $columnas = [
        ['name' => 'check', 'label' => '', 'sortable' => false, 'searchable' => false],
        ['name' => 'id', 'label' => 'ID', 'sortable' => false, 'searchable' => false],
        ['name' => 'codigo', 'label' => 'Código', 'sortable' => true, 'searchable' => true],
        ['name' => 'nombre_corto', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ['name' => 'contenido', 'label' => 'Contenido', 'sortable' => true, 'searchable' => true],
        ['name' => 'tipo_empaque', 'label' => 'Tipo de Empaque', 'sortable' => true, 'searchable' => true],
    ];

    public function mount($selectedCode = null, $key = null)
    {
        $this->selectedCode = $selectedCode;
        $this->key = $key;
    }

    public function render()
    {
        $query = CodigoBarra::query();

        $query = $this->aplicarFiltros($query, $this->columnas);
        $codigosBarras = $query->paginate($this->perPage);

        return view('livewire.codigos-barras-selector-table', [
            'codigosBarras' => $codigosBarras,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($codigoBarra, $columna)
    {
        $campo = $columna['name'];
        return $codigoBarra->$campo ?? '-';
    }
}
