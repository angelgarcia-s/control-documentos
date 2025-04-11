<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CodigoBarra;
use App\Models\TipoEmpaque;
use App\Models\Empaque;

class CrearCodigosBarras extends Component
{
    public $codigos = [];
    public $tiposEmpaque;
    public $empaques;

    protected $rules = [
        'codigos.*.tipo' => 'required|in:EAN13,ITF14',
        'codigos.*.codigo' => 'required|string|max:50|unique:codigos_barras,codigo',
        'codigos.*.nombre' => 'required|string|max:255',
        'codigos.*.tipo_empaque' => 'required|string|max:50|exists:tipos_empaque,nombre',
        'codigos.*.empaque' => 'required|string|max:50|exists:empaques,nombre',
        'codigos.*.contenido' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->tiposEmpaque = TipoEmpaque::all(['id', 'nombre']);
        $this->empaques = Empaque::all(['id', 'nombre']);
        $this->agregarFila();
    }

    // Personalizar nombres de los campos para los mensajes de error
    protected $validationAttributes = [
        'codigos.*.tipo' => 'Tipo',
        'codigos.*.codigo' => 'Código',
        'codigos.*.nombre' => 'Producto',
        'codigos.*.tipo_empaque' => 'Tipo de Empaque',
        'codigos.*.empaque' => 'Empaque',
        'codigos.*.contenido' => 'Contenido',
    ];

    public function agregarFila()
    {
        if (count($this->codigos) < 5) {
            $nuevaFila = [
                'tipo' => '',
                'codigo' => '',
                'nombre' => count($this->codigos) === 0 ? '' : $this->codigos[0]['nombre'],
                'tipo_empaque' => '',
                'empaque' => '',
                'contenido' => '',
            ];
            $this->codigos[] = $nuevaFila;
        }
    }

    public function eliminarFila($index)
    {
        if (count($this->codigos) > 1) {
            unset($this->codigos[$index]);
            $this->codigos = array_values($this->codigos);
        }
    }

    public function updated($propertyName)
    {
        if (str_starts_with($propertyName, 'codigos.0.nombre') && count($this->codigos) > 1) {
            $primerNombre = $this->codigos[0]['nombre'];
            foreach ($this->codigos as $index => &$codigo) {
                if ($index > 0) {
                    $codigo['nombre'] = $primerNombre;
                }
            }
        }
    }

    public function guardar()
    {
        $this->resetErrorBag();
        $this->validate();

        // Validaciones adicionales
        $codigosUsados = [];
        $tiposEmpaqueUsados = [];
        $ean13Count = 0;

        foreach ($this->codigos as $index => $codigo) {
            // Validar duplicados de código entre filas
            if (in_array($codigo['codigo'], $codigosUsados)) {
                $this->addError("codigos.$index.codigo", "El código '{$codigo['codigo']}' ya está en otra fila.");
                return;
            }
            $codigosUsados[] = $codigo['codigo'];

            // Validar duplicados de tipo_empaque
            if (in_array($codigo['tipo_empaque'], $tiposEmpaqueUsados)) {
                $this->addError("codigos.$index.tipo_empaque", "El tipo de empaque '{$codigo['tipo_empaque']}' ya está en otra fila.");
                return;
            }
            $tiposEmpaqueUsados[] = $codigo['tipo_empaque'];

            // Validar longitud según tipo
            $longitud = strlen($codigo['codigo']);
            if ($codigo['tipo'] === 'EAN13') {
                if ($longitud !== 13) {
                    $this->addError("codigos.$index.codigo", "El código EAN13 debe tener exactamente 13 dígitos.");
                    return;
                }
                if ($ean13Count > 0) {
                    $this->addError("codigos.$index.tipo", "Solo puede haber un código EAN13.");
                    return;
                }
                $ean13Count++;
            } elseif ($codigo['tipo'] === 'ITF14') {
                if ($longitud !== 14) {
                    $this->addError("codigos.$index.codigo", "El código ITF14 debe tener exactamente 14 dígitos.");
                    return;
                }
                // Permitimos múltiples ITF14, solo validamos longitud y unicidad del código
            }
        }

        try {
            foreach ($this->codigos as $codigoData) {
                CodigoBarra::create([
                    'tipo' => $codigoData['tipo'],
                    'codigo' => $codigoData['codigo'],
                    'nombre' => $codigoData['nombre'],
                    'tipo_empaque' => $codigoData['tipo_empaque'],
                    'empaque' => $codigoData['empaque'],
                    'contenido' => $codigoData['contenido'],
                ]);
            }
            return redirect()->route('codigos-barras.index')->with('success', 'Códigos de barra creados correctamente.');
        } catch (\Exception $e) {
            $this->addError('general', 'Error al crear los códigos de barra: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.crear-codigos-barras');
    }
}