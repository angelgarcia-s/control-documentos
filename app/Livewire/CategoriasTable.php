<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Traits\HasTableFeatures;

class CategoriasTable extends Component
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
            $categoria = Categoria::find($this->confirmingDelete);
            if ($categoria) {
                if ($categoria->productos()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar la categoría porque tiene productos asociados.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    $categoria->delete();
                    session()->flash('success', 'Categoría eliminada correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar la categoría: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Categoría no encontrada.';
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
        $query = Categoria::query()
            ->with(['productos'])
            ->withCount(['productos']);

        $query = $this->aplicarFiltros($query, $this->columnas);
        $categorias = $query->paginate($this->perPage);

        return view('livewire.categorias-table', [
            'categorias' => $categorias,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($categoria, $columna)
    {
        $campo = $columna['name'];
        return $categoria->$campo ?? '-';
    }
}
