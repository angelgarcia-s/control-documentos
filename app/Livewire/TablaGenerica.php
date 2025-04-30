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
    public $errorMessage = '';

    public $modelo;
    public $columnas = [];
    public $acciones = [];
    public $relaciones = [];
    public $relacionesBloqueantes = []; // Propiedad para relaciones que bloquean eliminación
    public $botones = [];

    protected $queryString = [
        'search' => ['except' => []],
        'orderBy' => ['except' => 'id'],
        'orderDirection' => ['except' => 'asc'],
        'perPage' => ['except' => 10],
    ];

    public function mount($modelo, $columnas, $acciones = [], $relaciones = [], $relacionesBloqueantes = [], $botones = [])
    {
        $this->modelo = $modelo;
        $this->columnas = $columnas;
        $this->acciones = $acciones;
        $this->relaciones = $relaciones;
        $this->relacionesBloqueantes = $relacionesBloqueantes;
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

    // Método público para limpiar el mensaje desde el frontend
    public function clearErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function eliminarElemento()
    {
        if ($this->confirmingDelete) {
            $elemento = $this->modelo::find($this->confirmingDelete);
            if ($elemento) {
                // Validar relaciones después de la confirmación
                foreach ($this->relacionesBloqueantes as $relacion) {
                    if (method_exists($elemento, $relacion)) { // Si la relación no existe (ej. print_cards), simplemente la ignoramos
                        if ($elemento->$relacion()->count() > 0) {
                            $this->errorMessage = "No se puede eliminar el elemento porque tiene {$relacion} asociados.";
                            $this->confirmingDelete = null;
                            $this->selectedActions = [];
                            return;
                        }
                    }
                }

                try {
                    $elemento->delete();
                    session()->flash('success', 'Elemento eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el elemento: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
                $this->selectedActions = []; // Reiniciamos todos los <select>
            } else {
                $this->errorMessage = 'Elemento no encontrado.';
                $this->confirmingDelete = null;
                $this->selectedActions = [];
            }
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

        // Cargar relaciones con conteo
        if (!empty($this->relaciones)) {
            $query->with($this->relaciones)->withCount($this->relaciones);
        }

        // Lógica de búsqueda
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
            'elementos' => $elementos,
            'columnas' => $this->columnas,
            'acciones' => $this->acciones,
            'botones' => $this->botones,
        ]);
    }

    // Método para renderizar el valor de una columna, con soporte para callbacks
    public function getColumnValue($elemento, $columna)
    {
        if (isset($columna['callback']) && method_exists($this, $columna['callback'])) {
            return $this->{$columna['callback']}($elemento);
        }

        if (isset($columna['relationship'])) {
            return $elemento->{$columna['relationship']}?->nombre ?? '-';
        }

        $campo = $columna['name'];
        return $elemento->$campo ?? '-';
    }
}
