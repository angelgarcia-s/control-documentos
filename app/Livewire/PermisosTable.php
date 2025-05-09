<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use App\Traits\HasTableFeatures;

class PermisosTable extends Component
{
    use HasTableFeatures;

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'name', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ['name' => 'description', 'label' => 'Descripción', 'sortable' => true, 'searchable' => true],
        ['name' => 'category', 'label' => 'Categoría', 'sortable' => true, 'searchable' => true],
    ];

    public $categoriasDisponibles = [];

    public function mount()
    {
        // Obtener las categorías únicas de la tabla permissions y ordenarlas alfabéticamente (ASC)
        $this->categoriasDisponibles = Permission::select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        // Ordenar alfabéticamente en orden ascendente
        sort($this->categoriasDisponibles);
    }

    public function updateCategory($permissionId, $newCategory)
    {
        $permiso = Permission::find($permissionId);
        if ($permiso) {
            $permiso->update(['category' => $newCategory]);
            session()->flash('success', 'Categoría actualizada correctamente.');
        } else {
            session()->flash('error', 'Permiso no encontrado.');
        }
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
