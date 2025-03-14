<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class ProductosTable extends Component
{
    use WithPagination;

    public $search = [];
    public $orderBy = 'id';
    public $orderDirection = 'asc';
    public $perPage = 10;
    public $confirmingDelete = null;

    protected $queryString = [];

    // Definir las columnas de la tabla
    public $columns = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true],
        ['name' => 'id_familia', 'label' => 'Familia', 'sortable' => true, 'searchable' => true],
        ['name' => 'producto', 'label' => 'Producto', 'sortable' => true, 'searchable' => true],
        ['name' => 'id_color', 'label' => 'Color', 'sortable' => true, 'searchable' => true],
        ['name' => 'id_tamano', 'label' => 'Tamaño', 'sortable' => true, 'searchable' => true],
        ['name' => 'multiplos_master', 'label' => 'Múltiplos Master', 'sortable' => true, 'searchable' => true],
        ['name' => 'cupo_tarima', 'label' => 'Cupo Tarima', 'sortable' => true, 'searchable' => true],
        ['name' => 'id_proveedor', 'label' => 'Proveedor', 'sortable' => true, 'searchable' => true],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->orderBy === $field) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderBy = $field;
            $this->orderDirection = 'asc';
        }
    }

    public function confirmDelete($productoId)
    {
        $this->confirmingDelete = $productoId;
    }

    public function deleteProducto()
    {
        if ($this->confirmingDelete) {
            Producto::find($this->confirmingDelete)?->delete();
            $this->confirmingDelete = null;
            session()->flash('success', 'Producto eliminado correctamente.');
        }
    }

    public function clearSearch($field)
    {
        $this->search[$field] = ''; // Borra el valor en Livewire
        $this->resetPage(); // Reinicia la paginación
    }

    public function clearAllFilters()
{
    $this->search = []; // Borra todos los valores de búsqueda
    $this->resetPage(); // Reinicia la paginación para mostrar todos los registros
}

    public function render()
    {
        $query = Producto::query()->with(['familia', 'proveedor', 'tamanos', 'colores']);

        foreach ($this->search as $field => $value) {
            if (!empty($value)) {
                if ($field === 'id_familia') {
                    $query->whereHas('familia', fn ($q) => $q->where('nombre', 'like', "%{$value}%"));
                } elseif ($field === 'id_color') {
                    $query->whereHas('colores', fn ($q) => $q->where('nombre', 'like', "%{$value}%"));
                } elseif ($field === 'id_tamano') {
                    $query->whereHas('tamanos', fn ($q) => $q->where('nombre', 'like', "%{$value}%"));
                } elseif ($field === 'id_proveedor') {
                    $query->whereHas('proveedor', fn ($q) => $q->where('nombre', 'like', "%{$value}%"));
                } else {
                    $query->where($field, 'like', "%{$value}%");
                }
            }
        }

        $query->orderBy($this->orderBy, $this->orderDirection);

        return view('livewire.productos-table', [
            'productos' => $query->paginate($this->perPage),
            'columns' => $this->columns,
        ]);
    }
}