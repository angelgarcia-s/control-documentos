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
        if (str_contains($campo, '.')) {
            [$relacion, $subcampo] = explode('.', $campo);
            if (!isset($this->search[$relacion])) {
                $this->search[$relacion] = [];
            }
            $this->search[$relacion][$subcampo] = '';
        } else {
            $this->search[$campo] = '';
        }
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
            // Manejar campos anidados (como producto.sku)
            if (is_array($valor)) {
                foreach ($valor as $subcampo => $subvalor) {
                    if (!empty($subvalor)) {
                        $fullField = "{$campo}.{$subcampo}";
                        $columna = collect($columnas)->firstWhere('name', $fullField);
                        if ($columna && $columna['searchable']) {
                            if (isset($columna['relationship'])) {
                                $query->whereHas($columna['relationship'], fn ($q) => $q->where($subcampo, 'like', "%{$subvalor}%"));
                            }
                        }
                    }
                }
            } else {
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
        }

        // Manejar ordenamiento para campos anidados
        if (str_contains($this->orderBy, '.')) {
            [$relacion, $field] = explode('.', $this->orderBy);
            $table = $relacion === 'producto' ? 'productos' : ($relacion === 'codigoBarra' ? 'codigos_barras' : null);
            if ($table) {
                $query->orderBy("{$table}.{$field}", $this->orderDirection);
            }
        } else {
            $query->orderBy($this->orderBy, $this->orderDirection);
        }

        return $query;
    }
}
