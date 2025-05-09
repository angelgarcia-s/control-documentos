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
