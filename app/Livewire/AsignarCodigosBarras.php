<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\CodigoBarra;
use App\Models\ClasificacionEnvase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AsignarCodigosBarras extends Component
{
    public $sku;
    public $producto;
    public $selectedCode = null;
    public $confirmingAssign = false;
    public $focusedInputIndex = null;
    public $filas = [];
    public $userMessage = null;
    public $codigoNombre = null;
    public $selectorKey = null;
    public $codigosAsignados = [];
    public $confirmingUnassign = null;
    public $codigoDesasignar;
    public $codigoDesasignarId;

    public function mount($sku)
    {
        $this->sku = $sku;
        $this->loadProductoAndCodigos();

        $this->filas[] = [
            'codigo' => '',
            'contenido' => '',
            'clasificacion_envase' => '',
        ];
        $this->userMessage = "Para asignar un código a un producto, primero selecciona el campo código y después elige un código de la lista.";
        $this->selectorKey = uniqid();

        $this->confirmingAssign = false;
        $this->confirmingUnassign = null;
        $this->codigoDesasignar = null;
        $this->codigoDesasignarId = null;
    }

    private function loadProductoAndCodigos()
    {
        $this->producto = Producto::where('sku', $this->sku)->with('codigosBarras')->firstOrFail();
        $codigosAsignados = $this->producto->codigosBarras;

        $clasificacionEnvasesOrden = ClasificacionEnvase::pluck('orden', 'nombre')->toArray();

        $this->codigosAsignados = $codigosAsignados->sortBy([
            ['nombre', 'asc'],
            fn($codigo) => $clasificacionEnvasesOrden[$codigo->clasificacion_envase] ?? 999,
        ]);
    }

    public function agregarFila()
    {
        if (count($this->filas) < 5) {
            $this->filas[] = [
                'codigo' => '',
                'contenido' => '',
                'clasificacion_envase' => '',
            ];
            $this->userMessage = "Nueva fila añadida. Ahora tienes " . count($this->filas) . " filas.";
            if ($this->focusedInputIndex !== null) {
                $this->dispatch('focus-row', index: $this->focusedInputIndex);
            }
        } else {
            $this->addErrorMessage("No puedes agregar más filas. Límite máximo alcanzado (5).");
        }
    }

    public function eliminarFila($index)
    {
        if (count($this->filas) > 1) {
            unset($this->filas[$index]);
            $this->filas = array_values($this->filas);
            if ($this->focusedInputIndex == $index) {
                $this->focusedInputIndex = null;
                $this->userMessage = "Fila " . ($index + 1) . " eliminada. No tienes ninguna fila seleccionada.";
                $this->dispatch('clear-focus');
            } else {
                $this->userMessage = "Fila " . ($index + 1) . " eliminada.";
                if ($this->focusedInputIndex !== null) {
                    $this->dispatch('focus-row', index: $this->focusedInputIndex);
                }
            }
        }
    }

    public function setFocus($index)
    {
        $this->focusedInputIndex = $index;
        $this->userMessage = "Seleccionaste el campo de la fila " . ($index + 1) . ", ahora selecciona un código de barras.";
        $this->dispatch('focus-row', index: $index);
    }

    public function clearFocus()
    {
        $this->focusedInputIndex = null;
        $this->dispatch('clear-focus');
        $this->userMessage = "Agrega otra fila para asignar un código a otro empaque ó da click en Guardar para finalizar.";
    }

    public function confirmarDesasignacion($codigoBarraId)
    {
        try {
            $this->codigoDesasignar = CodigoBarra::findOrFail($codigoBarraId);
            $this->codigoDesasignarId = $codigoBarraId;

            $this->confirmingAssign = false;
            $this->confirmingUnassign = $codigoBarraId;

            $this->dispatch('refresh');
        } catch (\Exception $e) {
            session()->flash('error', "Error al intentar abrir el modal de desasignación: " . $e->getMessage());
        }
    }

    public function cancelarDesasignacion()
    {
        $this->confirmingAssign = false;
        $this->confirmingUnassign = null;
        $this->codigoDesasignar = null;
        $this->codigoDesasignarId = null;
    }

    public function desasignar()
    {
        try {
            $this->producto->codigosBarras()->detach($this->codigoDesasignarId);
            $this->loadProductoAndCodigos();

            session()->flash('success', 'Código de barras desasignado correctamente.');

            $this->confirmingUnassign = null;
            $this->codigoDesasignar = null;
            $this->codigoDesasignarId = null;

            $this->selectorKey = uniqid();
        } catch (\Exception $e) {
            session()->flash('error', "Error al desasignar el código de barras: " . $e->getMessage());
        }
    }

    public function selectCode($value)
    {
        $this->selectedCode = $value;
        $this->userMessage = "Código de barras seleccionado con id: " . $value . ". Para continuar da click en el botón Asignar";
        if ($this->focusedInputIndex !== null) {
            $this->dispatch('focus-row', index: $this->focusedInputIndex);
        }
    }

    public function asignar()
    {
        if (!$this->selectedCode || $this->focusedInputIndex === null) {
            $this->addErrorMessage("Por favor, selecciona un campo de código y un código en una fila antes de asignar.");
            return;
        }

        $codigo = CodigoBarra::find($this->selectedCode);
        if (!$codigo) {
            $this->addErrorMessage("El código seleccionado (" . $this->selectedCode . ") no se encuentra en la base of datos.");
            return;
        }

        $this->resetErrorBag('filas.' . $this->focusedInputIndex . '.codigo');

        foreach ($this->filas as $index => $fila) {
            if ($index !== $this->focusedInputIndex && $fila['codigo'] === $codigo->codigo) {
                $this->addErrorMessage("El código " . $codigo->codigo . " ya está asignado en la fila " . ($index + 1) . ". Por favor, selecciona otro código.");
                return;
            }
        }

        if ($this->codigosAsignados->contains('codigo', $codigo->codigo)) {
            $this->addErrorMessage("El código " . $codigo->codigo . " ya está asignado a este producto.");
            return;
        }

        $clasificacionEnvaseSeleccionado = $codigo->clasificacion_envase;
        if ($clasificacionEnvaseSeleccionado) {
            foreach ($this->filas as $index => $fila) {
                if ($index !== $this->focusedInputIndex && $fila['clasificacion_envase'] === $clasificacionEnvaseSeleccionado) {
                    $this->addErrorMessage("El tipo de empaque " . $clasificacionEnvaseSeleccionado . " ya está asignado en la fila " . ($index + 1) . ". Por favor, selecciona otro código con un tipo de empaque diferente.");
                    return;
                }
            }

            if ($this->codigosAsignados->contains('clasificacion_envase', $clasificacionEnvaseSeleccionado)) {
                $this->addErrorMessage("El tipo de empaque " . $clasificacionEnvaseSeleccionado . " ya está asignado a otro código para este producto.");
                return;
            }
        }

        $familiaProducto = $this->producto->familia ? $this->producto->familia->nombre : 'Desconocido';
        $nombreCodigo = $codigo->nombre;

        $coincide = $this->coincidenNombres($familiaProducto, $nombreCodigo);

        if (!$coincide) {
            $this->confirmingAssign = true;
            $this->codigoNombre = $codigo->nombre;
            $this->addErrorMessage("Los nombres no coinciden. Por favor, confirma la asignación.");
            return;
        }

        $this->asignarCodigo($this->focusedInputIndex, $codigo);
        $this->addSuccessMessage("Código " . $codigo->codigo . " asignado a la fila " . ($this->focusedInputIndex + 1) . ".");
        $this->selectedCode = null;
        $this->clearFocus();
        $this->selectorKey = uniqid();
    }

    public function confirmarAsignacion()
    {
        $codigo = CodigoBarra::find($this->selectedCode);
        if ($codigo && $this->focusedInputIndex !== null) {
            foreach ($this->filas as $index => $fila) {
                if ($index !== $this->focusedInputIndex && $fila['codigo'] === $codigo->codigo) {
                    $this->addErrorMessage("El código " . $codigo->codigo . " ya está asignado en la fila " . ($index + 1) . ". Por favor, selecciona otro código.");
                    $this->confirmingAssign = false;
                    $this->selectedCode = null;
                    $this->codigoNombre = null;
                    return;
                }
            }

            if ($this->codigosAsignados->contains('codigo', $codigo->codigo)) {
                $this->addErrorMessage("El código " . $codigo->codigo . " ya está asignado a este producto.");
                $this->confirmingAssign = false;
                $this->selectedCode = null;
                $this->codigoNombre = null;
                return;
            }

            $clasificacionEnvaseSeleccionado = $codigo->clasificacion_envase;
            if ($clasificacionEnvaseSeleccionado) {
                foreach ($this->filas as $index => $fila) {
                    if ($index !== $this->focusedInputIndex && $fila['clasificacion_envase'] === $clasificacionEnvaseSeleccionado) {
                        $this->addErrorMessage("El tipo de empaque " . $clasificacionEnvaseSeleccionado . " ya está asignado en la fila " . ($index + 1) . ". Por favor, selecciona otro código con un tipo de empaque diferente.");
                        $this->confirmingAssign = false;
                        $this->selectedCode = null;
                        $this->codigoNombre = null;
                        return;
                    }
                }

                if ($this->codigosAsignados->contains('clasificacion_envase', $clasificacionEnvaseSeleccionado)) {
                    $this->addErrorMessage("El tipo de empaque " . $clasificacionEnvaseSeleccionado . " ya está asignado a otro código para este producto.");
                    $this->confirmingAssign = false;
                    $this->selectedCode = null;
                    $this->codigoNombre = null;
                    return;
                }
            }

            $this->asignarCodigo($this->focusedInputIndex, $codigo);
            $this->addSuccessMessage("Asignación confirmada: Código " . $codigo->codigo . " asignado a la fila " . ($this->focusedInputIndex + 1) . ".");
        }
        $this->confirmingAssign = false;
        $this->selectedCode = null;
        $this->codigoNombre = null;
        $this->clearFocus();
        $this->selectorKey = uniqid();
    }

    public function cancelarAsignacion()
    {
        $this->confirmingAssign = false;
        $this->selectedCode = null;
        $this->codigoNombre = null;
        $this->addErrorMessage("La asignación del código ha sido cancelada.");
        if ($this->focusedInputIndex !== null) {
            $this->dispatch('focus-row', index: $this->focusedInputIndex);
        }
        $this->selectorKey = uniqid();
    }

    private function asignarCodigo($index, $codigo)
    {
        if (isset($this->filas[$index])) {
            $this->filas[$index]['codigo'] = $codigo->codigo;
            $this->filas[$index]['contenido'] = $codigo->contenido ?? 'N/A';
            $this->filas[$index]['clasificacion_envase'] = $codigo->clasificacion_envase ?? '-';
        }
    }

    private function coincidenNombres($familiaProducto, $nombreCodigo)
    {
        return trim(strtolower($familiaProducto)) === trim(strtolower($nombreCodigo));
    }

    private function addUserMessage($message)
    {
        session()->flash('user_message', $message);
    }

    private function addErrorMessage($message)
    {
        session()->flash('error', $message);
    }

    private function addSuccessMessage($message)
    {
        session()->flash('success', $message);
    }

    public function guardar()
    {
        $this->validate([
            'filas.*.codigo' => 'required|string|exists:codigos_barras,codigo',
        ]);

        try {
            $codigosAsignadosCodigos = $this->codigosAsignados->pluck('codigo')->toArray();
            $codigosAsignadosClasificacionesEnvases = $this->codigosAsignados->pluck('clasificacion_envase')->toArray();

            foreach ($this->filas as $fila) {
                $codigoBarra = CodigoBarra::where('codigo', $fila['codigo'])->first();
                if ($codigoBarra) {
                    if (in_array($fila['codigo'], $codigosAsignadosCodigos)) {
                        $this->addErrorMessage("El código " . $fila['codigo'] . " ya está asignado a este producto.");
                        return;
                    }

                    $clasificacionEnvase = $codigoBarra->clasificacion_envase ?? '-';
                    if (in_array($clasificacionEnvase, $codigosAsignadosClasificacionesEnvases)) {
                        $this->addErrorMessage("El tipo de empaque " . $clasificacionEnvase . " ya está asignado a otro código para este producto.");
                        return;
                    }

                    $codigosAsignadosCodigos[] = $fila['codigo'];
                    $codigosAsignadosClasificacionesEnvases[] = $clasificacionEnvase;
                }
            }

            $request = new Request();
            $request->replace([
                'filas' => $this->filas,
                '_token' => csrf_token(),
            ]);

            $controller = new \App\Http\Controllers\ProductoCodigosBarrasController();
            $response = $controller->store($request, $this->sku);

            $responseData = $response->getData(true);

            if (isset($responseData['success']) && $responseData['success']) {
                $this->loadProductoAndCodigos();
                return redirect()->route('codigos-barras.asignar', $this->sku)->with('success', 'Códigos asignados correctamente.');
            } else {
                $errorMessage = $responseData['message'] ?? 'Ocurrió un error desconocido al intentar guardar los códigos.';
                $this->addErrorMessage($errorMessage);
            }
        } catch (\Exception $e) {
            $this->addErrorMessage("Error al guardar los códigos: " . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.asignar-codigos-barras', [
            'clasificacionEnvase' => clasificacionEnvase::all(['id', 'nombre']),
        ]);
    }
}
