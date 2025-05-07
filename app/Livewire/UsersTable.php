<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Traits\HasTableFeatures;

class UsersTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'name', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ['name' => 'email', 'label' => 'Correo electrónico', 'sortable' => true, 'searchable' => true],
        ['name' => 'roles', 'label' => 'Rol', 'sortable' => false, 'searchable' => false, 'callback' => 'getRoles'],
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
            $user = User::find($this->confirmingDelete);
            if ($user) {
                try {
                    $user->delete();
                    session()->flash('success', 'Usuario eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el usuario: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Usuario no encontrado.';
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
        $query = User::query()
            ->with(['roles']);

        $query = $this->aplicarFiltros($query, $this->columnas);
        $users = $query->paginate($this->perPage);

        return view('livewire.users-table', [
            'users' => $users,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($user, $columna)
    {
        if (isset($columna['callback'])) {
            $callback = $columna['callback'];
            return $this->$callback($user);
        }

        $campo = $columna['name'];
        return $user->$campo ?? '-';
    }

    public function getRoles($elemento)
    {
        return $elemento->roles->pluck('name')->implode(', ');
    }
}
