<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FamiliaProducto;
use App\Traits\HasTableFeatures;

class FamiliasTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'imagen', 'label' => 'Imagen', 'sortable' => false, 'searchable' => false],
        ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ['name' => 'descripcion', 'label' => 'Descripción', 'sortable' => true, 'searchable' => true],
        ['name' => 'categoria.nombre', 'label' => 'Categoría', 'sortable' => true, 'searchable' => true, 'relationship' => 'categoria'],
        ['name' => 'productos_count', 'label' => 'Productos', 'sortable' => true, 'searchable' => false],
    ];

    public function mount()
    {
        $this->confirmingDelete = null;
        $this->search = [];
        foreach ($this->columnas as $columna) {
            if (isset($columna['relationship'])) {
                [$relacion, $subcampo] = explode('.', $columna['name']);
                if (!isset($this->search[$relacion])) {
                    $this->search[$relacion] = [];
                }
                $this->search[$relacion][$subcampo] = '';
            }
        }
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
            $familia = FamiliaProducto::find($this->confirmingDelete);
            if ($familia) {
                if ($familia->productos()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar la familia porque tiene productos asociados.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    if ($familia->imagen) {
                        \Storage::disk('public')->delete($familia->imagen);
                    }
                    $familia->delete();
                    session()->flash('success', 'Familia eliminada correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar la familia: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Familia no encontrada.';
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
        $query = FamiliaProducto::query()
            ->with(['categoria', 'productos'])
            ->withCount(['productos']);

        $query = $this->aplicarFiltros($query, $this->columnas);
        $familias = $query->paginate($this->perPage);

        return view('livewire.familias-table', [
            'familias' => $familias,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($familia, $columna)
    {
        if ($columna['name'] === 'imagen') {
            return $familia->imagen ? '<img src="' . asset('storage/' . $familia->imagen) . '" class="w-10 h-10 object-cover rounded" />' : '-';
        }

        if (isset($columna['relationship'])) {
            [$relacion, $subcampo] = explode('.', $columna['name']);
            return $familia->$relacion->$subcampo ?? '-';
        }

        $campo = $columna['name'];
        return $familia->$campo ?? '-';
    }
}
