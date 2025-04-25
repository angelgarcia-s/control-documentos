<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductoCodigosBarras;

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
            ['name' => 'producto.sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true, 'relationship' => 'producto'],
            ['name' => 'producto.nombre_corto', 'label' => 'Producto', 'sortable' => true, 'searchable' => true, 'relationship' => 'producto'],
            ['name' => 'codigoBarra.codigo', 'label' => 'Código de barras', 'sortable' => true, 'searchable' => true, 'relationship' => 'codigoBarra'],
            ['name' => 'codigoBarra.nombre_corto', 'label' => 'Nombre Código', 'sortable' => true, 'searchable' => true, 'relationship' => 'codigoBarra'],
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
        // Manejar claves anidadas
        if (str_contains($campo, '.')) {
            [$relacion, $subcampo] = explode('.', $campo);
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
            ->with(['producto', 'codigoBarra'])
            ->join('productos', 'producto_codigos_barras.producto_id', '=', 'productos.id')
            ->join('codigos_barras', 'producto_codigos_barras.codigo_barra_id', '=', 'codigos_barras.id')
            ->select('producto_codigos_barras.*');

        // Manejar búsqueda con claves anidadas
        foreach ($this->columnas as $columna) {
            $campo = $columna['name'];
            if (isset($columna['relationship'])) {
                [$relacion, $subcampo] = explode('.', $campo);
                if (!empty($this->search[$relacion][$subcampo])) {
                    $valor = $this->search[$relacion][$subcampo];
                    $table = $relacion === 'producto' ? 'productos' : 'codigos_barras';
                    $query->where("{$table}.{$subcampo}", 'like', "%{$valor}%");
                }
            } else {
                if (!empty($this->search[$campo])) {
                    $valor = $this->search[$campo];
                    $query->where("producto_codigos_barras.{$campo}", 'like', "%{$valor}%");
                }
            }
        }

        if (str_contains($this->orderBy, 'producto.')) {
            $field = explode('.', $this->orderBy)[1];
            $query->orderBy("productos.{$field}", $this->orderDirection);
        } elseif (str_contains($this->orderBy, 'codigoBarra.')) {
            $field = explode('.', $this->orderBy)[1];
            $query->orderBy("codigos_barras.{$field}", $this->orderDirection);
        } else {
            $query->orderBy("producto_codigos_barras.{$this->orderBy}", $this->orderDirection);
        }

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
