<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empaque;
use App\Traits\HasTableFeatures;

class EmpaquesTable extends Component
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
            $empaque = Empaque::find($this->confirmingDelete);
            if ($empaque) {
                try {
                    $empaque->delete();
                    session()->flash('success', 'Empaque eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el empaque: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Empaque no encontrado.';
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
        $query = Empaque::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $empaques = $query->paginate($this->perPage);

        return view('livewire.empaques-table', [
            'empaques' => $empaques,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($empaque, $columna)
    {
        $campo = $columna['name'];
        return $empaque->$campo ?? '-';
    }
}
