<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Material;
use App\Traits\HasTableFeatures;

class MaterialesTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
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
            $material = Material::find($this->confirmingDelete);
            if ($material) {
                try {
                    $material->delete();
                    session()->flash('success', 'Material eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el material: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Material no encontrado.';
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
        $query = Material::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $materiales = $query->paginate($this->perPage);

        return view('livewire.materiales-table', [
            'materiales' => $materiales,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($material, $columna)
    {
        $campo = $columna['name'];
        return $material->$campo ?? '-';
    }
}
