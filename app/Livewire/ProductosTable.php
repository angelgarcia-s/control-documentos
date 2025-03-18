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

    public function executeAction($id, $action)
    {
        if ($action === 'editar') {
            return redirect()->route('productos.edit', ['producto' => $id]);
        }

        if ($action === 'borrar') {
            $this->confirmDelete($id);
        }
    }

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
        $this->dispatch('open-modal', 'delete-producto');
    }

    public function deleteProducto()
    {
        if ($this->confirmingDelete) {
            $producto = Producto::find($this->confirmingDelete);
            if ($producto) {
                $producto->delete();
                $this->confirmingDelete = null;
                $this->dispatch('close-modal', 'delete-producto');
                session()->flash('success', 'Producto eliminado correctamente.');
                $this->resetPage();
                $this->dispatch('resetSelects');
            } else {
                session()->flash('error', 'Producto no encontrado.');
                $this->confirmingDelete = null;
                $this->dispatch('close-modal', 'delete-producto');
            }
        }
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = null;
        $this->dispatch('close-modal', 'delete-producto');
        $this->dispatch('resetSelects');
    }

    public function clearSearch($field)
    {
        $this->search[$field] = '';
        $this->resetPage();
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