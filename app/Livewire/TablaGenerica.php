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
    public $perPage = 10; // Valor inicial de elementos por página
    public $perPageOptions = [10, 25, 50, 100, 200]; // Opciones para el <select>
    public $confirmingDelete = null;
    public $selectedActions = []; // Controla los valores de los <select>

    public $modelo;
    public $columnas = [];
    public $acciones = [];
    public $relaciones = [];
    public $botones = [];

    protected $queryString = [
        'search' => ['except' => []],
        'orderBy' => ['except' => 'id'],
        'orderDirection' => ['except' => 'asc'],
        'perPage' => ['except' => 10],
    ];

    public function mount($modelo, $columnas, $acciones = [], $relaciones = [], $botones = [])
    {
        $this->modelo = $modelo;
        $this->columnas = $columnas;
        $this->acciones = $acciones;
        $this->relaciones = $relaciones;
        $this->botones = $botones;
        $this->confirmingDelete = null; // Aseguramos que sea null al montar
        $this->selectedActions = []; // Reiniciamos al montar
        
    }

    public function ejecutarAccion($id, $accion)
    {
        if ($accion && method_exists($this, $accion)) {
            $this->$accion($id);
        }
        $this->selectedActions[$id] = ''; // Reiniciamos el <select> específico después de la acción
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
                session()->flash('success', 'Elemento eliminado correctamente.');
                $this->resetPage();
                $this->dispatch('reiniciarSelects');
            } else {
                session()->flash('error', 'Elemento no encontrado.');
                $this->confirmingDelete = null;
            }
            $this->selectedActions = []; // Reiniciamos todos los <select>
        }
    }

    public function cancelarEliminar()
    {
        $this->confirmingDelete = null;
        $this->selectedActions = []; // Reiniciamos todos los <select>
    }

    public function limpiarBusqueda($campo)
    {
        $this->search[$campo] = ''; // Limpiamos el campo de búsqueda especificado
        $this->resetPage(); // Reseteamos la paginación para mostrar todos los resultados
    }

    public function updatingPerPage()
    {
        $this->resetPage(); // Vuelve a la primera página al cambiar $perPage
    }

    public function ordenarPor($columna)
    {
        if ($this->orderBy === $columna) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderBy = $columna;
            $this->orderDirection = 'asc';
        }
        $this->resetPage(); // Volver a la primera página al ordenar
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
        $elementos = $query->paginate($this->perPage);

        return view('livewire.tabla-generica', [
            'elementos' => $query->paginate($this->perPage),
            'columnas' => $this->columnas,
            'acciones' => $this->acciones,
            'botones' => $this->botones,
        ]);
    }
}