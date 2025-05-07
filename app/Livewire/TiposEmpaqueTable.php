<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TipoEmpaque;
use App\Traits\HasTableFeatures;

class TiposEmpaqueTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'orden', 'label' => 'Orden', 'sortable' => true, 'searchable' => true],
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
            $tipoEmpaque = TipoEmpaque::find($this->confirmingDelete);
            if ($tipoEmpaque) {
                try {
                    $tipoEmpaque->delete();
                    session()->flash('success', 'Tipo de empaque eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el tipo de empaque: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Tipo de empaque no encontrado.';
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
        $query = TipoEmpaque::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $tiposEmpaque = $query->paginate($this->perPage);

        return view('livewire.tipos-empaque-table', [
            'tiposEmpaque' => $tiposEmpaque,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($tipoEmpaque, $columna)
    {
        $campo = $columna['name'];
        return $tipoEmpaque->$campo ?? '-';
    }
}
