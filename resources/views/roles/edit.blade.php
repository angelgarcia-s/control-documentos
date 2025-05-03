@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Editar Rol</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('roles.update', $role) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Formulario de Edición de {{ $role->name }}</div>
                </div>
                <div class="box-body">
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label for="name" class="form-label">Nombre del Rol</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="md:col-span-12 col-span-12 mb-4">
                            <label class="form-label">Permisos</label>
                            <div class="space-y-4">
                                @php
                                    // Agrupar permisos por módulo (basado en el prefijo del nombre)
                                    $groupedPermissions = $permissions->groupBy(function ($permission) {
                                        return explode('-', $permission->name)[1]; // Ejemplo: "ver-usuarios" -> "usuarios"
                                    });
                                @endphp

                                @foreach ($groupedPermissions as $module => $modulePermissions)
                                    <div class="border p-4 rounded-lg">
                                        <div class="flex justify-between items-center mb-2">
                                            <h4 class="text-lg font-semibold capitalize">{{ $module }}</h4>
                                            <div class="flex items-center">
                                                <label for="module-{{ $module }}" class="text-sm text-gray-300 me-3 dark:text-[#8c9097] dark:text-white/50">
                                                    Activar/Desactivar Todos
                                                </label>
                                                <input type="checkbox" id="module-{{ $module }}" class="ti-switch module-checkbox shrink-0 !w-[35px] !h-[21px] before:size-4"
                                                       data-module="{{ $module }}">
                                            </div>
                                        </div>
                                        <div class="space-y-2">
                                            @foreach ($modulePermissions as $permission)
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                                           class="ti-switch shrink-0 !w-[35px] !h-[21px] before:size-4 module-permission module-{{ $module }}"
                                                           id="permission-{{ $permission->name }}"
                                                           {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                    <label for="permission-{{ $permission->name }}" class="text-sm text-gray-500 ms-3 dark:text-[#8c9097] dark:text-white/50">
                                                        {{ ucfirst(str_replace('ver', 'Visualización', str_replace('crear', 'Creación', str_replace('editar', 'Edición', str_replace('eliminar', 'Eliminación', explode('-', $permission->name)[0]))))) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('permissions') <div class="text-danger text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('roles.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Cancelar</a>
                    <button type="submit" class="ti-btn ti-btn-primary-full">Actualizar Rol</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('styles')
    <style>
        .ti-switch.intermediate {
            border: 2px solid #6779a1 !important; /* Borde ajustado */
            color: #64748b;
        }
        .ti-switch.intermediate:checked {
            background-color: transparent;
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Función para actualizar el estado del checkbox "Activar/Desactivar Todos" dinámicamente
            function updateModuleCheckbox(module) {
                const moduleCheckbox = document.querySelector(`.module-checkbox[data-module="${module}"]`);
                if (!moduleCheckbox) {
                    console.error(`No se encontró el checkbox para el módulo: ${module}`);
                    return;
                }
                const modulePermissions = document.querySelectorAll(`.module-${module}`);
                const allChecked = Array.from(modulePermissions).every(p => p.checked);
                const anyChecked = Array.from(modulePermissions).some(p => p.checked);

                // Si todos los permisos están marcados, el checkbox está completamente activo
                // Si ningún permiso está marcado, el checkbox está completamente desactivado
                // Si algunos permisos están marcados, el checkbox está activo con borde #6779a1
                moduleCheckbox.checked = allChecked || anyChecked;
                if (anyChecked && !allChecked) {
                    moduleCheckbox.classList.add('intermediate');
                } else {
                    moduleCheckbox.classList.remove('intermediate');
                }

                //console.log(`Module: ${module}, All Checked: ${allChecked}, Any Checked: ${anyChecked}, Checkbox State: ${moduleCheckbox.checked}`);
            }

            // Manejar el checkbox de "Activar/Desactivar Todos" por módulo
            document.querySelectorAll('.module-checkbox').forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    const module = this.getAttribute('data-module');
                    const modulePermissions = document.querySelectorAll(`.module-${module}`);
                    modulePermissions.forEach(function (permission) {
                        permission.checked = checkbox.checked;
                    });
                    updateModuleCheckbox(module); // Actualizar el estado dinámicamente
                });
            });

            // Sincronizar el estado del checkbox "Activar/Desactivar Todos" basado en los permisos individuales
            document.querySelectorAll('.module-permission').forEach(function (permission) {
                permission.addEventListener('change', function () {
                    // Buscar la clase que comienza con "module-" y no es "module-permission"
                    const moduleClass = Array.from(this.classList).find(cls => cls.startsWith('module-') && cls !== 'module-permission');
                    if (!moduleClass) {
                        console.error('No se encontró la clase del módulo en el permiso:', this.classList);
                        return;
                    }
                    const module = moduleClass.replace('module-', '');
                    console.log(`Permission changed for module: ${module}, Permission: ${this.value}, Checked: ${this.checked}`);
                    updateModuleCheckbox(module); // Actualizar el estado dinámicamente
                });
            });

            // Inicializar el estado del checkbox "Activar/Desactivar Todos" al cargar la página
            document.querySelectorAll('.module-checkbox').forEach(function (checkbox) {
                const module = checkbox.getAttribute('data-module');
                updateModuleCheckbox(module); // Actualizar el estado inicial
            });
        });
    </script>
@endsection
