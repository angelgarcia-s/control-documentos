<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TipoSello;
use App\Traits\HasTableFeatures;

class TiposSelloTable extends Component
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
            $tipoSello = TipoSello::find($this->confirmingDelete);
            if ($tipoSello) {
                try {
                    $tipoSello->delete();
                    session()->flash('success', 'Tipo de sello eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el tipo de sello: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Tipo de sello no encontrado.';
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
        $query = TipoSello::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $tiposSello = $query->paginate($this->perPage);

        return view('livewire.tipos-sello-table', [
            'tiposSello' => $tiposSello,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($tipoSello, $columna)
    {
        $campo = $columna['name'];
        return $tipoSello->$campo ?? '-';
    }
}
