<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Acabado;
use App\Traits\HasTableFeatures;

class AcabadosTable extends Component
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
            $acabado = Acabado::find($this->confirmingDelete);
            if ($acabado) {
                try {
                    $acabado->delete();
                    session()->flash('success', 'Acabado eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el acabado: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Acabado no encontrado.';
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
        $query = Acabado::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $acabados = $query->paginate($this->perPage);

        return view('livewire.acabados-table', [
            'acabados' => $acabados,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($acabado, $columna)
    {
        $campo = $columna['name'];
        return $acabado->$campo ?? '-';
    }
}
