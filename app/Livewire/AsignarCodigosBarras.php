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

    public function mount($sku)
    {
        $this->sku = $sku;
        $this->producto = Producto::where('sku', $sku)->firstOrFail();
        // Inicializar la primera fila
        $this->filas[] = [
            'codigo' => '',
            'contenido' => '',
            'tipo_empaque' => '',
        ];
        // Mensaje inicial para guiar al usuario
        $this->addUserMessage("Selecciona un código y establece el foco en una fila para asignar.");
    }

    public function agregarFila()
    {
        if (count($this->filas) < 5) { // Límite máximo de 5 filas
            $this->filas[] = [
                'codigo' => '',
                'contenido' => '',
                'tipo_empaque' => '',
            ];
            $this->addUserMessage("Nueva fila añadida. Ahora tienes " . count($this->filas) . " filas.");
        } else {
            $this->addUserMessage("No puedes agregar más filas. Límite máximo alcanzado (5).");
        }
    }

    public function eliminarFila($index)
    {
        if (count($this->filas) > 1) {
            unset($this->filas[$index]);
            $this->filas = array_values($this->filas);
            if ($this->focusedInputIndex == $index) {
                $this->focusedInputIndex = null;
                $this->addUserMessage("Fila " . ($index + 1) . " eliminada. Se ha limpiado el foco.");
            } else {
                $this->addUserMessage("Fila " . ($index + 1) . " eliminada.");
            }
        }
    }

    public function setFocus($index)
    {
        $this->focusedInputIndex = $index;
        $this->addUserMessage("Foco establecido en la fila " . ($index + 1) . ".");
    }

    public function selectCode($value)
    {
        $this->selectedCode = $value;
        $this->addUserMessage("Código seleccionado: " . $value);
    }

    public function asignar()
    {
        if (!$this->selectedCode || $this->focusedInputIndex === null) {
            $this->addUserMessage("Por favor, selecciona un código y establece el foco en una fila antes de asignar.");
            return;
        }

        $codigo = CodigoBarra::find($this->selectedCode);
        if (!$codigo) {
            $this->addUserMessage("El código seleccionado (" . $this->selectedCode . ") no se encuentra en la base de datos.");
            return;
        }

        $nombreCorto = $this->producto->nombre_corto;
        $nombreCodigo = $codigo->nombre;
        $coincide = $this->coincidenNombres($nombreCorto, $nombreCodigo);

        if (!$coincide) {
            $this->confirmingAssign = true;
            $this->dispatch('abrir-modal', 'confirmar-asignacion');
            $this->addUserMessage("Los nombres no coinciden. Por favor, confirma la asignación.");
            return;
        }

        $this->asignarCodigo($this->focusedInputIndex, $codigo);
        $this->addUserMessage("Código " . $codigo->codigo . " asignado a la fila " . ($this->focusedInputIndex + 1) . ".");
        $this->selectedCode = null; // Limpiar la selección del radio button
    }

    public function confirmarAsignacion()
    {
        $codigo = CodigoBarra::find($this->selectedCode);
        if ($codigo && $this->focusedInputIndex !== null) {
            $this->asignarCodigo($this->focusedInputIndex, $codigo);
            $this->addUserMessage("Asignación confirmada: Código " . $codigo->codigo . " asignado a la fila " . ($this->focusedInputIndex + 1) . ".");
        }
        $this->confirmingAssign = false;
        $this->selectedCode = null; // Limpiar la selección del radio button
    }

    public function cancelarAsignacion()
    {
        $this->confirmingAssign = false;
        $this->selectedCode = null; // Limpiar la selección del radio button
        $this->addUserMessage("Asignación cancelada.");
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
        session()->flash('user_message', $message); // Mostrar solo el mensaje más reciente
    }

    public function guardar()
    {
        // Validar que todas las filas tengan un código asignado
        $this->validate([
            'filas.*.codigo' => 'required|string|exists:codigos_barras,codigo',
            'filas.*.tipo_empaque' => 'required|string|max:50',
            'filas.*.contenido' => 'nullable|string|max:255',
        ]);

        // Enviar las filas al método store del controlador
        $response = Http::post(route('codigos-barras.asignar.store', $this->sku), [
            'filas' => $this->filas,
            '_token' => csrf_token(),
        ]);

        if ($response->successful()) {
            // Redirigir con mensaje de éxito
            return redirect()->route('codigos-barras.asignar', $this->sku)->with('success', 'Códigos asignados correctamente.');
        } else {
            $this->addUserMessage("Error al asignar los códigos: " . $response->body());
        }
    }

    public function render()
    {
        return view('livewire.asignar-codigos-barras', [
            'tiposEmpaque' => TipoEmpaque::all(['id', 'nombre']),
        ]);
    }
}
