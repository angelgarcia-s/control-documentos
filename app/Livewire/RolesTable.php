<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Traits\HasTableFeatures;

class RolesTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'name', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
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
            $role = Role::find($this->confirmingDelete);
            if ($role) {
                if ($role->users()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar el rol porque está asignado a usuarios.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    $role->delete();
                    session()->flash('success', 'Rol eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el rol: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Rol no encontrado.';
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
        $query = Role::query();
        $query = $this->aplicarFiltros($query, $this->columnas);
        $roles = $query->paginate($this->perPage);

        return view('livewire.roles-table', [
            'roles' => $roles,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($role, $columna)
    {
        $campo = $columna['name'];
        return $role->$campo ?? '-';
    }
}
