<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Database\QueryException;

class ProveedoresController extends Controller
{

    /**
     * Muestra la vista de productos con Livewire.
     */
    public function index()
    {
        return view('proveedores.index')->name('proveedores.index');
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        return view('productos.create')->name('proveedores.create');
    }


    public function show($id)
    {
        $proveedor = Proveedor::all()->findOrFail($id);
        return view('productos.show', compact('proveedor'))
        ->name('proveedores.show');
    }

}