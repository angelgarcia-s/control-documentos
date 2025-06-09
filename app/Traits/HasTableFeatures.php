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
                                $this->aplicarBusquedaRelacion($query, $columna['relationship'], $subvalor);
                            }
                        }
                    }
                }
            } else {
                if (!empty($valor)) {
                    $columna = collect($columnas)->firstWhere('name', $campo);
                    if ($columna && $columna['searchable']) {
                        if (isset($columna['relationship'])) {
                            $this->aplicarBusquedaRelacion($query, $columna['relationship'], $valor);
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

    /**
     * Aplicar búsqueda en relaciones complejas
     * Maneja tanto relaciones simples como anidadas (ej: 'productoCodigoBarra.sku')
     */
    private function aplicarBusquedaRelacion($query, $relationship, $valor)
    {
        if (str_contains($relationship, '.')) {
            // Relación anidada como 'productoCodigoBarra.sku'
            $partes = explode('.', $relationship);

            if (count($partes) === 2) {
                [$relacion, $campo] = $partes;

                // Casos especiales para diferentes tipos de relaciones
                if ($relacion === 'productoCodigoBarra') {
                    if ($campo === 'sku') {
                        // Buscar en producto.sku a través de productoCodigoBarra
                        $query->whereHas('productoCodigoBarra.producto', function($q) use ($valor) {
                            $q->where('sku', 'like', "%{$valor}%");
                        });
                    } elseif ($campo === 'codigoBarra') {
                        // Buscar en codigoBarra.codigo a través de productoCodigoBarra
                        $query->whereHas('productoCodigoBarra.codigoBarra', function($q) use ($valor) {
                            $q->where('codigo', 'like', "%{$valor}%");
                        });
                    } else {
                        // Campo directo en productoCodigoBarra (como clasificacion_envase)
                        $query->whereHas('productoCodigoBarra', function($q) use ($campo, $valor) {
                            $q->where($campo, 'like', "%{$valor}%");
                        });
                    }
                } else {
                    // Relación genérica anidada
                    $query->whereHas($relacion, function($q) use ($campo, $valor) {
                        $q->where($campo, 'like', "%{$valor}%");
                    });
                }
            }
        } else {
            // Relación simple
            $query->whereHas($relationship, function($q) use ($valor) {
                $q->where('nombre', 'like', "%{$valor}%");
            });
        }
    }
}
