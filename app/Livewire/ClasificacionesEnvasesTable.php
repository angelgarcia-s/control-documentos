<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClasificacionEnvase;
use App\Traits\HasTableFeatures;

class ClasificacionesEnvasesTable extends Component
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
            $clasificacionEnvase = ClasificacionEnvase::find($this->confirmingDelete);
            if ($clasificacionEnvase) {
                try {
                    $clasificacionEnvase->delete();
                    session()->flash('success', 'Clasificacion de envase eliminada correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar la clasificación de envase ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Clasificacion no encontrada.';
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
        $query = ClasificacionEnvase::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $clasificacionesEnvases = $query->paginate($this->perPage);

        return view('livewire.clasificaciones-envases-table', [
            'clasificacionesEnvases' => $clasificacionesEnvases,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($clasificacionEnvase, $columna)
    {
        $campo = $columna['name'];
        return $clasificacionEnvase->$campo ?? '-';
    }
}
