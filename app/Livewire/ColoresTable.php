<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Color;
use App\Traits\HasTableFeatures;

class ColoresTable extends Component
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
            $color = Color::find($this->confirmingDelete);
            if ($color) {
                if ($color->productos()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar el color porque tiene productos asociados.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    $color->delete();
                    session()->flash('success', 'Color eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el color: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Color no encontrado.';
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
        $query = Color::query()
            ->with(['productos'])
            ->withCount(['productos']);

        $query = $this->aplicarFiltros($query, $this->columnas);
        $colores = $query->paginate($this->perPage);

        return view('livewire.colores-table', [
            'colores' => $colores,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($color, $columna)
    {
        $campo = $columna['name'];
        return $color->$campo ?? '-';
    }
}
