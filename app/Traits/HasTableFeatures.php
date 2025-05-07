<?php

namespace App\Traits;

use Livewire\WithPagination;

trait HasTableFeatures
{
    use WithPagination;

    public $search = [];
    public $orderBy = 'id';
    public $orderDirection = 'asc';
    public $perPage = 10;
    public $perPageOptions = [10, 25, 50, 100, 200];

    protected $queryString = [
        'search' => ['except' => []],
        'orderBy' => ['except' => 'id'],
        'orderDirection' => ['except' => 'asc'],
        'perPage' => ['except' => 10],
    ];

    public function limpiarBusqueda($campo)
    {
        $this->search[$campo] = '';
        $this->resetPage();
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

    protected function aplicarFiltros($query, $columnas)
    {
        foreach ($this->search as $campo => $valor) {
            if (!empty($valor)) {
                $columna = collect($columnas)->firstWhere('name', $campo);
                if ($columna && $columna['searchable']) {
                    if (isset($columna['relationship'])) {
                        $query->whereHas($columna['relationship'], fn ($q) => $q->where('nombre', 'like', "%{$valor}%"));
                    } else {
                        $query->where($campo, 'like', "%{$valor}%");
                    }
                }
            }
        }
        return $query->orderBy($this->orderBy, $this->orderDirection);
    }
}
