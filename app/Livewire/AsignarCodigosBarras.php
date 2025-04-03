<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;

class AsignarCodigosBarras extends Component
{
    public $producto;

    public function mount(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function render()
    {
        return view('livewire.asignar-codigos-barras');
    }
}