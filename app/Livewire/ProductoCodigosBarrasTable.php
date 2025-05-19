<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductoCodigosBarras;
use App\Traits\HasTableFeatures;

class ProductoCodigosBarrasTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'producto.sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true, 'relationship' => 'producto'],
        ['name' => 'producto.nombre_corto', 'label' => 'Producto', 'sortable' => true, 'searchable' => true, 'relationship' => 'producto'],
        ['name' => 'codigoBarra.codigo', 'label' => 'Código de barras', 'sortable' => true, 'searchable' => true, 'relationship' => 'codigoBarra'],
        ['name' => 'codigoBarra.nombre_corto', 'label' => 'Nombre Código', 'sortable' => true, 'searchable' => true, 'relationship' => 'codigoBarra'],
        ['name' => 'clasificacion_envase', 'label' => 'Tipo de Empaque', 'sortable' => true, 'searchable' => true],
        ['name' => 'contenido', 'label' => 'Contenido', 'sortable' => true, 'searchable' => true],
    ];

    public function mount()
    {
        $this->confirmingDelete = null;
        $this->search = [];
        // Inicializar search para campos anidados
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
            $elemento = ProductoCodigosBarras::find($this->confirmingDelete);
            if ($elemento) {
                try {
                    $elemento->delete();
                    session()->flash('success', 'Asignación eliminada correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar la asignación: ' . $e->getMessage();
                }
                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Asignación no encontrada.';
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
        $query = ProductoCodigosBarras::query()
            ->with(['producto', 'codigoBarra'])
            ->join('productos', 'producto_codigos_barras.producto_id', '=', 'productos.id')
            ->join('codigos_barras', 'producto_codigos_barras.codigo_barra_id', '=', 'codigos_barras.id')
            ->select('producto_codigos_barras.*');

        $query = $this->aplicarFiltros($query, $this->columnas);
        $elementos = $query->paginate($this->perPage);

        return view('livewire.producto-codigos-barras-table', [
            'elementos' => $elementos,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($elemento, $columna)
    {
        if (isset($columna['relationship'])) {
            [$relacion, $subcampo] = explode('.', $columna['name']);
            return $elemento->$relacion->$subcampo ?? '-';
        }

        $campo = $columna['name'];
        return $elemento->$campo ?? '-';
    }
}
