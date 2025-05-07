<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CodigoBarra;
use App\Traits\HasTableFeatures;

class CodigosBarrasTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'consecutivo_codigo', 'label' => 'Consecutivo', 'sortable' => true, 'searchable' => true],
        ['name' => 'codigo', 'label' => 'Código', 'sortable' => true, 'searchable' => true],
        ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ['name' => 'tipo_empaque', 'label' => 'Tipo de Empaque', 'sortable' => true, 'searchable' => true],
        ['name' => 'empaque', 'label' => 'Empaque', 'sortable' => true, 'searchable' => true],
        ['name' => 'contenido', 'label' => 'Contenido', 'sortable' => true, 'searchable' => true],
        ['name' => 'tipo', 'label' => 'Tipo', 'sortable' => true, 'searchable' => true],
        ['name' => 'productos_count', 'label' => 'Productos', 'sortable' => true, 'searchable' => false],
    ];

    public function mount()
    {
        $this->confirmingDelete = null;
        $this->orderBy = 'consecutivo_codigo';
        $this->orderDirection = 'desc';
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
            $codigoBarra = CodigoBarra::find($this->confirmingDelete);
            if ($codigoBarra) {
                if ($codigoBarra->productos()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar el código de barras porque tiene productos asociados.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    $codigoBarra->delete();
                    session()->flash('success', 'Código de barras eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el código de barras: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Código de barras no encontrado.';
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
        $query = CodigoBarra::query()
            ->with(['productos'])
            ->withCount(['productos']);

        $query = $this->aplicarFiltros($query, $this->columnas);
        $codigosBarras = $query->paginate($this->perPage);

        return view('livewire.codigos-barras-table', [
            'codigosBarras' => $codigosBarras,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($codigoBarra, $columna)
    {
        $campo = $columna['name'];
        return $codigoBarra->$campo ?? '-';
    }
}
