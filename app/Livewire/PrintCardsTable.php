<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PrintCard;
use App\Traits\HasTableFeatures;

class PrintCardsTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';
    public $columnasPersonalizadas = null;

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'sku', 'label' => 'SKU', 'sortable' => true, 'searchable' => true, 'relationship' => 'productoCodigoBarra.sku'],
        ['name' => 'nombre', 'label' => 'Nombre', 'sortable' => true, 'searchable' => true],
        ['name' => 'revision', 'label' => 'Revisión', 'sortable' => true, 'searchable' => true],
        ['name' => 'estado', 'label' => 'Estado', 'sortable' => true, 'searchable' => true],
        ['name' => 'producto_nombre_corto', 'label' => 'Producto', 'sortable' => true, 'searchable' => true, 'relationship' => 'productoCodigoBarra'],
        ['name' => 'proveedor', 'label' => 'Proveedor', 'sortable' => true, 'searchable' => true, 'relationship' => 'proveedor'],
        ['name' => 'registro_sanitario', 'label' => 'Registro Sanitario', 'sortable' => true, 'searchable' => true],
        ['name' => 'fecha', 'label' => 'Fecha', 'sortable' => true, 'searchable' => false],
    ];


    public function mount($productoCodigoBarra = null, $columnasPersonalizadas = null)
    {
        if ($columnasPersonalizadas) {
            $this->columnas = array_values(array_filter($this->columnas, function($col) use ($columnasPersonalizadas) {
                return in_array($col['name'], $columnasPersonalizadas);
            }));
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
            $printCard = PrintCard::find($this->confirmingDelete);
            if ($printCard) {
                try {
                    $printCard->delete();
                    session()->flash('success', 'PrintCard eliminado correctamente.');
                    $this->resetPage();
                    $this->dispatch('reiniciarSelects');
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar el PrintCard: ' . $e->getMessage();
                }
                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'PrintCard no encontrado.';
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
        $query = PrintCard::query()->with(['productoCodigoBarra.producto', 'proveedor', 'creador']);
        $query = $this->aplicarFiltros($query, $this->columnas);
        $printCards = $query->paginate($this->perPage);

        return view('livewire.print-cards-table', [
            'printCards' => $printCards,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($printCard, $columna)
    {
        if (isset($columna['relationship'])) {

            if ($columna['relationship'] === 'productoCodigoBarra') {
                return $printCard->productoCodigoBarra->producto->nombre_corto ?? '-';
            }
            if ($columna['relationship'] === 'productoCodigoBarra.sku') {
                return $printCard->productoCodigoBarra->producto->sku ?? '-';
            }
            if ($columna['relationship'] === 'proveedor') {
                return $printCard->proveedor->nombre ?? '-';
            }
        }
        $campo = $columna['name'];
        if ($campo === 'fecha') {
            return $printCard->fecha ? \Carbon\Carbon::parse($printCard->fecha)->format('d/m/Y') : '-';
        }
        return $printCard->$campo ?? '-';
    }
}
