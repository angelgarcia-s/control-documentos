<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use App\Traits\HasTableFeatures;

class PermisosTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'name', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ['name' => 'description', 'label' => 'Descripción', 'sortable' => true, 'searchable' => true],
        ['name' => 'category', 'label' => 'Categoría', 'sortable' => true, 'searchable' => true],
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
            $permiso = Permission::find($this->confirmingDelete);
            if ($permiso) {
                try {
                    $permiso->delete();
                    session()->flash('success', 'Permiso eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el permiso: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Permiso no encontrado.';
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
        $query = Permission::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $permisos = $query->paginate($this->perPage);

        return view('livewire.permisos-table', [
            'permisos' => $permisos,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($permiso, $columna)
    {
        $campo = $columna['name'];
        return $permiso->$campo ?? '-';
    }
}
