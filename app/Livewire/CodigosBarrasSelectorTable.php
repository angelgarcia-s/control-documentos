<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CodigoBarra;

class CodigosBarrasSelectorTable extends Component
{
    use WithPagination;

    public $search = [];
    public $orderBy = 'id';
    public $orderDirection = 'asc';
    public $perPage = 10;
    public $perPageOptions = [10, 25, 50, 100, 200];
    public $selectedCode;
    public $key;

    protected $queryString = [
        'search' => ['except' => []],
        'orderBy' => ['except' => 'id'],
        'orderDirection' => ['except' => 'asc'],
        'perPage' => ['except' => 10],
    ];

    public function mount($selectedCode = null, $key = null)
    {
        $this->selectedCode = $selectedCode;
        $this->key = $key;
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function ordenarPor($columna)
    {
        if ($this->orderBy === $columna) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderBy = $columna;
            $this->orderDirection = 'asc';
        }
        $this->resetPage();
    }

    public function limpiarBusqueda($campo)
    {
        $this->search[$campo] = '';
        $this->resetPage();
    }

    public function render()
    {
        $query = CodigoBarra::query();

        $columnas = [
            ['name' => 'check', 'label' => '', 'sortable' => false, 'searchable' => false],
            ['name' => 'id', 'label' => 'ID', 'sortable' => false, 'searchable' => false],
            ['name' => 'codigo', 'label' => 'Código', 'sortable' => true, 'searchable' => true],
            ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
            ['name' => 'contenido', 'label' => 'Contenido', 'sortable' => true, 'searchable' => true],
            ['name' => 'tipo_empaque', 'label' => 'Tipo de Empaque', 'sortable' => true, 'searchable' => true],
        ];

        foreach ($this->search as $campo => $valor) {
            if (!empty($valor) && in_array($campo, array_column($columnas, 'name'))) {
                $query->where($campo, 'like', "%{$valor}%");
            }
        }

        $elementos = $query->orderBy($this->orderBy, $this->orderDirection)
                           ->paginate($this->perPage);

        return view('livewire.codigos-barras-selector-table', [
            'elementos' => $elementos,
            'columnas' => $columnas,
            'perPageOptions' => $this->perPageOptions,
            'selectedCode' => $this->selectedCode,
        ]);
    }
}
