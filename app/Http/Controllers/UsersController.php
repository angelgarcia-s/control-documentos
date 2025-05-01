<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     */
    public function index()
    {
        return view('usuarios.index');
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        // Carga todos los roles disponibles para mostrarlos en el formulario
        $roles = Role::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        // Crea el nuevo usuario con la contraseña encriptada
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asigna los roles seleccionados al usuario
        $user->syncRoles($request->roles);

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Muestra los detalles de un usuario específico.
     */
    public function show(User $user)
    {
        // Carga los roles del usuario para mostrarlos en la vista
        $roles = $user->roles;
        return view('usuarios.show', compact('user', 'roles'));
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     */
    public function edit(User $user)
    {
        // Carga todos los roles disponibles para mostrarlos en el formulario
        $roles = Role::all();
        return view('usuarios.edit', compact('user', 'roles'));
    }

    /**
     * Actualiza un usuario existente en la base de datos.
     */
    public function update(Request $request, User $user)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        // Actualiza el usuario con los nuevos datos
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        // Sincroniza los roles del usuario con los seleccionados
        $user->syncRoles($request->roles);

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Elimina un usuario de la base de datos.
     */
    public function destroy(User $user)
    {
        // Elimina el usuario
        $user->delete();

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
