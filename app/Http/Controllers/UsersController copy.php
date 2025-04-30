<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    public function index()
    {
        return view('usuarios.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('usuarios.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('usuarios.index')->with('success', 'Roles actualizados correctamente.');
    }
}
