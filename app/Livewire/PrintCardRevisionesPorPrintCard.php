<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PrintCardRevision;
use App\Traits\HasTableFeatures;

class PrintCardRevisionesPorPrintCard extends Component
{
    use HasTableFeatures;

    public $printCardId;
    public $confirmingDelete = null;
    public $errorMessage = '';
    public $perPage = 10;

    public $columnas = [
        ['name' => 'revision', 'label' => 'Revisión', 'sortable' => true, 'searchable' => true],
        ['name' => 'estado', 'label' => 'Estado', 'sortable' => true, 'searchable' => true],
        ['name' => 'revisado_por', 'label' => 'Revisor', 'sortable' => true, 'searchable' => true],
        ['name' => 'fecha_revision', 'label' => 'Fecha Revisión', 'sortable' => true, 'searchable' => false],
        ['name' => 'historial_revision', 'label' => 'Historial', 'sortable' => false, 'searchable' => false],
    ];

    public function mount($printCardId)
    {
        $this->printCardId = $printCardId;
    }

    public function clearErrorMessage()
    {
        $this->errorMessage = '';
    }

    public function confirmarEliminar($id)
    {
        $this->confirmingDelete = $id;
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
        $query = PrintCardRevision::query()
            ->where('print_card_id', $this->printCardId)
            ->with(['printCard', 'revisor']);
        $query = $this->aplicarFiltros($query, $this->columnas);
        $revisions = $query->paginate($this->perPage);

        return view('livewire.print-card-revisiones-table', [
            'revisions' => $revisions,
            'columnas' => $this->columnas,
        ]);
    }

    public function getColumnValue($revision, $columna)
    {
        $campo = $columna['name'];
        if ($campo === 'revisado_por') {
            return $revision->revisor->name ?? '-';
        }
        if ($campo === 'fecha_revision') {
            return $revision->fecha_revision ? \Carbon\Carbon::parse($revision->fecha_revision)->format('d/M/Y') : '-';
        }
        return $revision->$campo ?? '-';
    }
}
