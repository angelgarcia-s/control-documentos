<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EstadoPrintCard;
use App\Traits\HasTableFeatures;

class EstadosPrintCardsTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ['name' => 'color', 'label' => 'Color', 'sortable' => true, 'searchable' => true],
        ['name' => 'activo', 'label' => 'Activo', 'sortable' => true, 'searchable' => true],
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
            $estado = EstadoPrintCard::find($this->confirmingDelete);
            if ($estado) {
                // Prevenir eliminación si está en uso
                if ($estado->printCards()->count() > 0) {
                    $this->errorMessage = 'No se puede eliminar el estado porque está en uso por una o más PrintCards.';
                    $this->confirmingDelete = null;
                    return;
                }
                try {
                    $estado->delete();
                    session()->flash('success', 'Estado eliminado correctamente.');
                    $this->resetPage();
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el estado: ' . $e->getMessage();
                }
                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Estado no encontrado.';
                $this->confirmingDelete = null;
            }
        }
    }

    public function render()
    {
        $query = EstadoPrintCard::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $estados = $query->paginate($this->perPage);

        return view('livewire.estados-print-cards-table', [
            'estados' => $estados,
            'columnas' => $this->columnas,
        ]);
    }
}
