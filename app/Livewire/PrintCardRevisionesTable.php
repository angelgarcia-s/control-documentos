<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PrintCardRevision;
use App\Traits\HasTableFeatures;

class PrintCardRevisionesTable extends Component
{
    use HasTableFeatures;

    public $confirmingDelete = null;
    public $errorMessage = '';

    public $columnas = [
        ['name' => 'id', 'label' => 'ID', 'sortable' => true, 'searchable' => true],
        ['name' => 'printCard', 'label' => 'PrintCard', 'sortable' => true, 'searchable' => true, 'relationship' => 'printCard', 'search_field' => 'nombre'],
        ['name' => 'revision', 'label' => 'Revisión', 'sortable' => true, 'searchable' => true],
        ['name' => 'estado', 'label' => 'Estado', 'sortable' => true, 'searchable' => true],
        ['name' => 'notas', 'label' => 'Notas', 'sortable' => false, 'searchable' => true],
        ['name' => 'revisor', 'label' => 'Revisor', 'sortable' => true, 'searchable' => true, 'relationship' => 'revisor', 'search_field' => 'name'],
        ['name' => 'fecha_revision', 'label' => 'Fecha Revisión', 'sortable' => true, 'searchable' => false],
        ['name' => 'pdf_path', 'label' => 'PDF', 'sortable' => false, 'searchable' => false],
        ['name' => 'historial_revision', 'label' => 'Historial', 'sortable' => false, 'searchable' => false],
    ];

    public $perPage = 10;

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
            $revision = PrintCardRevision::find($this->confirmingDelete);
            if ($revision) {
                try {
                    $revision->delete();
                    session()->flash('success', 'Revisión eliminada correctamente.');
                    $this->resetPage();
                } catch (\Exception $e) {
                    $this->errorMessage = 'Error al eliminar la revisión: ' . $e->getMessage();
                }
                $this->confirmingDelete = null;
            } else {
                $this->errorMessage = 'Revisión no encontrada.';
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
        $query = PrintCardRevision::query()->with(['printCard', 'revisor']);
        $query = $this->aplicarFiltros($query, $this->columnas);
        $revisions = $query->paginate($this->perPage);

        return view('livewire.print-card-revisiones-table', [
            'revisions' => $revisions,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($revision, $columna)
    {
        if (isset($columna['relationship'])) {
            if ($columna['name'] === 'printCard') {
                return $revision->printCard->nombre ?? '-';
            }
            if ($columna['name'] === 'revisor') {
                return $revision->revisor->name ?? '-';
            }
        }

        $campo = $columna['name'];
        if ($campo === 'pdf_path') {
            return $revision->pdf_path ? '<a href="' . asset('storage/' . $revision->pdf_path) . '" target="_blank" class="text-blue-600 hover:text-blue-800 underline">Ver PDF</a>' : '-';
        }
        if ($campo === 'fecha_revision') {
            return $revision->fecha_revision ? \Carbon\Carbon::parse($revision->fecha_revision)->format('d/m/Y H:i') : '-';
        }
        if ($campo === 'historial_revision') {
            return $revision->historial_revision ?
                '<span class="text-xs bg-gray-100 px-2 py-1 rounded">' . substr($revision->historial_revision, 0, 50) . '...</span>' : '-';
        }
        return $revision->$campo ?? '-';
    }
}
