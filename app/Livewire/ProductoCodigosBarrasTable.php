<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductoCodigosBarras;
use Illuminate\Database\QueryException;

class ProductoCodigosBarrasTable extends Component
{
    use WithPagination;

    public $search = [];
    public $orderBy = 'id';
    public $orderDirection = 'asc';
    public $perPage = 10;
    public $perPageOptions = [10, 25, 50, 100, 200];
    public $confirmingDelete = null;
    public $selectedActions = [];
    public $errorMessage = '';
    public $columnas = [];

    protected $queryString = [
        'search' => ['except' => []],
        'orderBy' => ['except' => 'id'],
        'orderDirection' => ['except' => 'asc'],
        'perPage' => ['except' => 10],
    ];

    public function mount()
    {
        $this->confirmingDelete = null;
        $this->selectedActions = [];
        $this->search = [];
        $this->columnas = [
            ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
            ['name' => 'producto.sku', 'label' => 'SKU Producto', 'sortable' => true, 'searchable' => true, 'relationship' => 'producto'],
            ['name' => 'producto.descripcion', 'label' => 'Producto', 'sortable' => true, 'searchable' => true, 'relationship' => 'producto'],
            ['name' => 'codigoBarra.codigo', 'label' => 'Código', 'sortable' => true, 'searchable' => true, 'relationship' => 'codigoBarra'],
            ['name' => 'codigoBarra.nombre', 'label' => 'Nombre Código', 'sortable' => true, 'searchable' => true, 'relationship' => 'codigoBarra'],
            ['name' => 'tipo_empaque', 'label' => 'Tipo de Empaque', 'sortable' => true, 'searchable' => true],
            ['name' => 'contenido', 'label' => 'Contenido', 'sortable' => true, 'searchable' => true],
        ];
    }

    public function ejecutarAccion($id, $accion)
    {
        if ($accion && method_exists($this, $accion)) {
            $this->$accion($id);
        }
        $this->selectedActions[$id] = '';
    }

    public function confirmarEliminar($id)
    {
        $this->confirmingDelete = $id;
        $this->dispatch('abrir-modal', 'eliminar-elemento');
    }

    public function clearErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function eliminarElemento()
    {
        if ($this->confirmingDelete) {
            $elemento = ProductoCodigosBarras::find($this->confirmingDelete);
            if ($elemento) {
                try {
                    $elemento->delete();
                    session()->flash('success', 'Asignación eliminada correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar la asignación: ' . $e->getMessage();
                }
                $this->confirmingDelete = null;
                $this->selectedActions = [];
            } else {
                $this->errorMessage = 'Asignación no encontrada.';
                $this->confirmingDelete = null;
                $this->selectedActions = [];
            }
        }
    }

    public function cancelarEliminar()
    {
        $this->confirmingDelete = null;
        $this->selectedActions = [];
    }

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

    public function editar($id)
    {
        return redirect()->route('producto-codigos-barras.edit', ['productoCodigosBarra' => $id]);
    }

    public function borrar($id)
    {
        $this->confirmarEliminar($id);
    }

    public function render()
    {
        $query = ProductoCodigosBarras::query()
            ->with(['producto', 'codigoBarra']);

        foreach ($this->search as $campo => $valor) {
            if (!empty($valor)) {
                $columna = collect($this->columnas)->firstWhere('name', $campo);
                if ($columna && $columna['searchable']) {
                    if (isset($columna['relationship'])) {
                        $field = explode('.', $columna['name'])[1];
                        $query->whereHas($columna['relationship'], fn ($q) => $q->where($field, 'like', "%{$valor}%"));
                    } else {
                        $query->where($campo, 'like', "%{$valor}%");
                    }
                }
            }
        }

        $query->orderBy($this->orderBy, $this->orderDirection);
        $elementos = $query->paginate($this->perPage);

        return view('livewire.producto-codigos-barras-table', [
            'elementos' => $elementos,
            'columnas' => $this->columnas,
            'acciones' => [
                'editar' => 'Editar',
                'borrar' => 'Borrar',
            ],
            'botones' => [
                ['ruta' => 'producto-codigos-barras.show', 'parametro' => 'productoCodigosBarra', 'etiqueta' => 'Ver', 'estilo' => 'primary'],
            ],
        ]);
    }
}