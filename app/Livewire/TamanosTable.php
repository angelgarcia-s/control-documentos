<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tamano;
use App\Traits\HasTableFeatures;

class TamanosTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
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
            $tamano = Tamano::find($this->confirmingDelete);
            if ($tamano) {
                if ($tamano->productos()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar el tamaño porque tiene productos asociados.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    $tamano->delete();
                    session()->flash('success', 'Tamaño eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el tamaño: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Tamaño no encontrado.';
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
        $query = Tamano::query()
            ->with(['productos'])
            ->withCount(['productos']);

        $query = $this->aplicarFiltros($query, $this->columnas);
        $tamanos = $query->paginate($this->perPage);

        return view('livewire.tamanos-table', [
            'tamanos' => $tamanos,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($tamano, $columna)
    {
        $campo = $columna['name'];
        return $tamano->$campo ?? '-';
    }
}
