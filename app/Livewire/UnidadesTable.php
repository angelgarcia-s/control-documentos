<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UnidadMedida;
use App\Traits\HasTableFeatures;

class UnidadesTable extends Component
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
            $unidad = UnidadMedida::find($this->confirmingDelete);
            if ($unidad) {
                if ($unidad->productos()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar la unidad de medida porque tiene productos asociados.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    $unidad->delete();
                    session()->flash('success', 'Unidad de medida eliminada correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar la unidad de medida: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Unidad de medida no encontrada.';
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
        $query = UnidadMedida::query()
            ->with(['productos']); // Aunque no se usa en columnas, se incluye para la validación de eliminación

        $query = $this->aplicarFiltros($query, $this->columnas);
        $unidades = $query->paginate($this->perPage);

        return view('livewire.unidades-table', [
            'unidades' => $unidades,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($unidad, $columna)
    {
        $campo = $columna['name'];
        return $unidad->$campo ?? '-';
    }
}
