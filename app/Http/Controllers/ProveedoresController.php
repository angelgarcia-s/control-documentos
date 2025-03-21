<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('proveedores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> ['required' , 'unique:proveedores' , 'string' , 'max:255',]
        // Opcional: Descomentar para mensajes personalizados
        // 'nombre.unique' => 'Ya existe un proveedor con ese nombre.',
        // 'nombre.required' => 'El nombre del proveedor es obligatorio.',
        // 'nombre.string' => 'El nombre debe ser texto.',
        // 'nombre.max' => 'El nombre no puede superar los 255 caracteres.',
        ]);

        Proveedor::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show' , compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
           'nombre' => ['required' , "unique:proveedores,nombre,{$proveedor->id}", 'string' , 'max:255']
    ]);

        $proveedor->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
