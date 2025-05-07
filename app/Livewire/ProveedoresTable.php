<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Proveedor;
use App\Traits\HasTableFeatures;

class ProveedoresTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ['name' => 'abreviacion', 'label' => 'Abreviación', 'sortable' => true, 'searchable' => true],
        ['name' => 'productos_count', 'label' => 'Productos', 'sortable' => true, 'searchable' => false],
    ];

    public function mount()
    {
        $this->confirmingDelete = null;
    }

    public function clearErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function confirmarEliminar($id)
    {
        $this->confirmingDelete = $id;
        $this->dispatch('abrir-modal', 'eliminar-elemento');
    }

    public function eliminarElemento()
    {
        if ($this->confirmingDelete) {
            $proveedor = Proveedor::find($this->confirmingDelete);
            if ($proveedor) {
                if ($proveedor->productos()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar el proveedor porque tiene productos asociados.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    $proveedor->delete();
                    session()->flash('success', 'Proveedor eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el proveedor: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Proveedor no encontrado.';
                $this->confirmingDelete = null;
            }
        }
    }

    public function cancelarEliminar()
    {
        $this->confirmingDelete = null;
    }

    public function render()
    {
        $query = Proveedor::query()
            ->with(['productos'])
            ->withCount(['productos']);

        $query = $this->aplicarFiltros($query, $this->columnas);
        $proveedores = $query->paginate($this->perPage);

        return view('livewire.proveedores-table', [
            'proveedores' => $proveedores,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($proveedor, $columna)
    {
        $campo = $columna['name'];
        return $proveedor->$campo ?? '-';
    }
}
