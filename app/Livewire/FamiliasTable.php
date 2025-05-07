<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FamiliaProducto;
use App\Traits\HasTableFeatures;

class FamiliasTable extends Component
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
            $familia = FamiliaProducto::find($this->confirmingDelete);
            if ($familia) {
                if ($familia->productos()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar la familia porque tiene productos asociados.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    $familia->delete();
                    session()->flash('success', 'Familia eliminada correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar la familia: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Familia no encontrada.';
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
        $query = FamiliaProducto::query()
            ->with(['productos'])
            ->withCount(['productos']);

        $query = $this->aplicarFiltros($query, $this->columnas);
        $familias = $query->paginate($this->perPage);

        return view('livewire.familias-table', [
            'familias' => $familias,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($familia, $columna)
    {
        $campo = $columna['name'];
        return $familia->$campo ?? '-';
    }
}
