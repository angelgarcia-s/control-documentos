<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class TablaGenerica extends Component
{
    use WithPagination;

    public $search = [];
    public $orderBy = 'id';
    public $orderDirection = 'asc';
    public $perPage = 10;
    public $confirmingDelete = null;

    public $modelo;
    public $columnas = [];
    public $acciones = [];
    public $relaciones = [];

    protected $queryString = [];

    public function mount($modelo, $columnas, $acciones = [], $relaciones = [])
    {
        $this->modelo = $modelo;
        $this->columnas = $columnas;
        $this->acciones = $acciones;
        $this->relaciones = $relaciones;
    }

    public function ejecutarAccion($id, $accion)
    {
        if ($accion && method_exists($this, $accion)) {
            $this->$accion($id);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function ordenarPor($campo)
    {
        if ($this->orderBy === $campo) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderBy = $campo;
            $this->orderDirection = 'asc';
        }
    }

    public function confirmarEliminar($id)
    {
        $this->confirmingDelete = $id;
        $this->dispatch('abrir-modal', 'eliminar-elemento');
    }

    public function eliminarElemento()
    {
        if ($this->confirmingDelete) {
            $elemento = $this->modelo::find($this->confirmingDelete);
            if ($elemento) {
                $elemento->delete();
                $this->confirmingDelete = null;
                $this->dispatch('cerrar-modal', 'eliminar-elemento');
                session()->flash('success', 'Elemento eliminado correctamente.');
                $this->resetPage();
                $this->dispatch('reiniciarSelects');
            } else {
                session()->flash('error', 'Elemento no encontrado.');
                $this->confirmingDelete = null;
                $this->dispatch('cerrar-modal', 'eliminar-elemento');
            }
        }
    }

    public function cancelarEliminar()
    {
        $this->confirmingDelete = null;
        $this->dispatch('cerrar-modal', 'eliminar-elemento');
        $this->dispatch('reiniciarSelects');
    }

    public function limpiarBusqueda($campo)
    {
        $this->search[$campo] = '';
        $this->resetPage();
    }

    public function render()
    {
        $query = $this->modelo::query();

        if (!empty($this->relaciones)) {
            $query->with($this->relaciones);
        }

        foreach ($this->search as $campo => $valor) {
            if (!empty($valor)) {
                $columna = collect($this->columnas)->firstWhere('name', $campo);
                if ($columna && $columna['searchable']) {
                    if (isset($columna['relationship'])) {
                        $query->whereHas($columna['relationship'], fn ($q) => $q->where('nombre', 'like', "%{$valor}%"));
                    } else {
                        $query->where($campo, 'like', "%{$valor}%");
                    }
                }
            }
        }

        $query->orderBy($this->orderBy, $this->orderDirection);

        return view('livewire.tabla-generica', [
            'elementos' => $query->paginate($this->perPage),
            'columnas' => $this->columnas,
            'acciones' => $this->acciones,
        ]);
    }
}