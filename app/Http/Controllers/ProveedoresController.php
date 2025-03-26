<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
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
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:proveedores,nombre',
            'abreviacion' => 'required|string|max:3|unique:proveedores,abreviacion',
        ]);

        try {
            Proveedor::create($validated);
            return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el proveedor: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        $proveedor->load('productos'); // Cargar productos asociados si los hay
        return view('proveedores.show', compact('proveedor'));
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
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:proveedores,nombre,' . $proveedor->id,
            'abreviacion' => 'required|string|max:3|unique:proveedores,abreviacion,' . $proveedor->id,
        ]);

        try {
            $proveedor->update($validated);
            return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el proveedor: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        try {
            if ($proveedor->productos()->count() > 0) {
                return redirect()->route('proveedores.index')->with('error', 'No se puede eliminar el proveedor porque tiene productos asociados.');
            }
            
            $proveedor->delete();
            return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') { // Violación de clave foránea
                return redirect()->route('proveedores.index')->with('error', 'No se puede eliminar el proveedor porque tiene productos asociados.');
            }
            return redirect()->route('proveedores.index')->with('error', 'Error al eliminar el proveedor: ' . $e->getMessage());
        }
    }
}
