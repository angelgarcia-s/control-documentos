<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Traits\HasTableFeatures;

class ProductosTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true],
        ['name' => 'nombre_corto', 'label' => 'Nombre Corto', 'sortable' => true, 'searchable' => true],
        ['name' => 'id_familia', 'label' => 'Familia', 'sortable' => true, 'searchable' => true, 'relationship' => 'familia'],
        ['name' => 'id_color', 'label' => 'Color', 'sortable' => true, 'searchable' => true, 'relationship' => 'color'],
        ['name' => 'id_tamano', 'label' => 'Tamaño', 'sortable' => true, 'searchable' => true, 'relationship' => 'tamano'],
        ['name' => 'multiplos_master', 'label' => 'Múltiplos Master', 'sortable' => true, 'searchable' => true],
        ['name' => 'cupo_tarima', 'label' => 'Cupo Tarima', 'sortable' => true, 'searchable' => true],
        ['name' => 'id_proveedor', 'label' => 'Proveedor', 'sortable' => true, 'searchable' => true, 'relationship' => 'proveedor'],
    ];

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
            $producto = Producto::find($this->confirmingDelete);
            if ($producto) {
                if ($producto->codigosBarras()->count() > 0) {
                    $this->errorMessage = "No se puede eliminar el producto porque tiene códigos de barras asociados.";
                    $this->confirmingDelete = null;
                    return;
                }

                try {
                    $producto->delete();
                    session()->flash('success', 'Producto eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el producto: ' . $e->getMessage();
                }

                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Producto no encontrado.';
                $this->confirmingDelete = null;
            }
        }
    }

    public function cancelarEliminar()
    {
        $this->confirmingDelete = null;
    }

    public function printcards($id)
    {
        // Lógica para "PrintCards" (por implementar)
    }

    public function render()
    {
        $query = Producto::query()
            ->with(['familia', 'proveedor', 'tamano', 'color', 'codigosBarras'])
            ->withCount(['codigosBarras']);

        $query = $this->aplicarFiltros($query, $this->columnas);
        $productos = $query->paginate($this->perPage);

        return view('livewire.productos-table', [
            'productos' => $productos,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($producto, $columna)
    {
        if (isset($columna['relationship'])) {
            return $producto->{$columna['relationship']}?->nombre ?? '-';
        }

        $campo = $columna['name'];
        return $producto->$campo ?? '-';
    }
}
