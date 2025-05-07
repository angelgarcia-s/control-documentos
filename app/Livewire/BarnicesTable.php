<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Barniz;
use App\Traits\HasTableFeatures;

class BarnicesTable extends Component
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
            $barniz = Barniz::find($this->confirmingDelete);
            if ($barniz) {
                try {
                    $barniz->delete();
                    session()->flash('success', 'Barniz eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el barniz: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Barniz no encontrado.';
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
        $query = Barniz::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $barnices = $query->paginate($this->perPage);

        return view('livewire.barnices-table', [
            'barnices' => $barnices,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($barniz, $columna)
    {
        $campo = $columna['name'];
        return $barniz->$campo ?? '-';
    }
}
