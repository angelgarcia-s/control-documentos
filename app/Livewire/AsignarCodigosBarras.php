<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\CodigoBarra;
use App\Models\TipoEmpaque;
use Illuminate\Support\Facades\Http;

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

    public function mount($sku)
    {
        $this->sku = $sku;
        $this->producto = Producto::where('sku', $sku)->firstOrFail();
        $this->filas[] = [
            'codigo' => '',
            'contenido' => '',
            'tipo_empaque' => '',
        ];
        $this->userMessage = "Para asignar un código a un producto, primero selecciona el campo código y después elige un código de la lista.";
        $this->selectorKey = uniqid();
    }

    public function agregarFila()
    {
        if (count($this->filas) < 5) {
            $this->filas[] = [
                'codigo' => '',
                'contenido' => '',
                'tipo_empaque' => '',
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
            $this->addErrorMessage("Por favor, selecciona un código y un campo de código en una fila antes de asignar.");
            return;
        }

        $codigo = CodigoBarra::find($this->selectedCode);
        if (!$codigo) {
            $this->addErrorMessage("El código seleccionado (" . $this->selectedCode . ") no se encuentra en la base de datos.");
            return;
        }

        // Validar que el código no esté ya asignado en otra fila
        foreach ($this->filas as $index => $fila) {
            if ($index !== $this->focusedInputIndex && $fila['codigo'] === $codigo->codigo) {
                $this->addErrorMessage("El código " . $codigo->codigo . " ya está asignado en la fila " . ($index + 1) . ". Por favor, selecciona otro código.");
                return;
            }
        }

        // Validar que el tipo de empaque no esté repetido en otra fila
        $tipoEmpaqueSeleccionado = $codigo->tipo_empaque;
        if ($tipoEmpaqueSeleccionado) {
            foreach ($this->filas as $index => $fila) {
                if ($index !== $this->focusedInputIndex && $fila['tipo_empaque'] === $tipoEmpaqueSeleccionado) {
                    $this->addErrorMessage("El tipo de empaque " . $tipoEmpaqueSeleccionado . " ya está asignado en la fila " . ($index + 1) . ". Por favor, selecciona otro código con un tipo de empaque diferente.");
                    return;
                }
            }
        }

        $nombreCorto = $this->producto->nombre_corto;
        $nombreCodigo = $codigo->nombre;
        $coincide = $this->coincidenNombres($nombreCorto, $nombreCodigo);

        if (!$coincide) {
            $this->confirmingAssign = true;
            $this->codigoNombre = $codigo->nombre; // Almacenar el nombre del código para el modal
            $this->dispatch('abrir-modal', 'confirmar-asignacion');
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
            // Validar que el código no esté ya asignado en otra fila
            foreach ($this->filas as $index => $fila) {
                if ($index !== $this->focusedInputIndex && $fila['codigo'] === $codigo->codigo) {
                    $this->addErrorMessage("El código " . $codigo->codigo . " ya está asignado en la fila " . ($index + 1) . ". Por favor, selecciona otro código.");
                    $this->confirmingAssign = false;
                    $this->selectedCode = null;
                    $this->codigoNombre = null; // Limpiar el nombre del código
                    return;
                }
            }

            // Validar que el tipo de empaque no esté repetido en otra fila
            $tipoEmpaqueSeleccionado = $codigo->tipo_empaque;
            if ($tipoEmpaqueSeleccionado) {
                foreach ($this->filas as $index => $fila) {
                    if ($index !== $this->focusedInputIndex && $fila['tipo_empaque'] === $tipoEmpaqueSeleccionado) {
                        $this->addErrorMessage("El tipo de empaque " . $tipoEmpaqueSeleccionado . " ya está asignado en la fila " . ($index + 1) . ". Por favor, selecciona otro código con un tipo de empaque diferente.");
                        $this->confirmingAssign = false;
                        $this->selectedCode = null;
                        $this->codigoNombre = null; // Limpiar el nombre del código
                        return;
                    }
                }
            }

            $this->asignarCodigo($this->focusedInputIndex, $codigo);
            $this->addSuccessMessage("Asignación confirmada: Código " . $codigo->codigo . " asignado a la fila " . ($this->focusedInputIndex + 1) . ".");
        }
        $this->confirmingAssign = false;
        $this->selectedCode = null;
        $this->codigoNombre = null; // Limpiar el nombre del código
        $this->clearFocus();
        $this->selectorKey = uniqid();

    }

    public function cancelarAsignacion()
    {
        $this->confirmingAssign = false;
        $this->selectedCode = null;
        $this->codigoNombre = null; // Limpiar el nombre del código

        $this->addErrorMessage("Asignación cancelada.");
        if ($this->focusedInputIndex !== null) {
            $this->dispatch('focus-row', index: $this->focusedInputIndex);
        }
        $this->selectorKey = uniqid();
    }

    private function asignarCodigo($index, $codigo)
    {
        if (isset($this->filas[$index])) {
            $this->filas[$index]['codigo'] = $codigo->codigo;
            $this->filas[$index]['contenido'] = $codigo->contenido ?? '';
            $this->filas[$index]['tipo_empaque'] = $codigo->tipo_empaque ?? '';
        }
    }

    private function coincidenNombres($nombreCorto, $nombreCodigo)
    {
        $palabrasCorto = explode(' ', strtolower($nombreCorto));
        $palabrasCodigo = explode(' ', strtolower($nombreCodigo));
        return count(array_intersect($palabrasCorto, $palabrasCodigo)) > 0;
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
            'filas.*.tipo_empaque' => 'required|string|max:50',
            'filas.*.contenido' => 'nullable|string|max:255',
        ]);

        $response = Http::post(route('codigos-barras.asignar.store', $this->sku), [
            'filas' => $this->filas,
            '_token' => csrf_token(),
        ]);

        if ($response->successful()) {
            return redirect()->route('codigos-barras.asignar', $this->sku)->with('success', 'Códigos asignados correctamente.');
        } else {
            $this->addErrorMessage("Error al asignar los códigos: " . $response->body());
        }
    }

    public function render()
    {
        return view('livewire.asignar-codigos-barras', [
            'tiposEmpaque' => TipoEmpaque::all(['id', 'nombre']),
        ]);
    }
}
