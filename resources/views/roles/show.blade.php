@extends('layouts.master')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white text-[1.125rem] font-semibold">Detalles del Rol: {{ $role->name }}</h3>
    </div>
    <x-breadcrumbs />
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Información del Rol</div>
                <div class="">
                    <a href="{{ route('roles.index') }}" class="ti-btn ti-btn-secondary-full mr-2">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                    <div class="md:col-span-6 col-span-12 mb-4">
                        <label class="form-label">Nombre del Rol</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $role->name }}</p>
                    </div>
                    <div class="md:col-span-12 col-span-12 mb-4">
                        <label class="form-label">Permisos</label>
                        <div class="hs-accordion-group">
                            @php
                                // Agrupar permisos por módulo (basado en el prefijo del nombre)
                                $groupedPermissions = $role->permissions->groupBy(function ($permission) {
                                    return explode('-', $permission->name)[1]; // Ejemplo: "ver-usuarios" -> "usuarios"
                                });
                            @endphp

                            @foreach ($groupedPermissions as $module => $modulePermissions)
                                <div class="hs-accordion overflow-hidden bg-white dark:bg-bodybg border -mt-px first:rounded-t-sm last:rounded-b-sm dark:bg-bgdark dark:border-white/10" id="hs-{{ $module }}-heading">
                                    <button class="hs-accordion-toggle hs-accordion-active:text-primary hs-accordion-active:bg-primary/10 group py-4 px-5 inline-flex items-center justify-between gap-x-3 w-full text-xl font-thin text-start text-gray-400 transition hover:text-gray-500 dark:hs-accordion-active:text-primary dark:text-gray-200 dark:hover:text-white/80" aria-controls="hs-{{ $module }}-collapse" type="button">
                                        <div class="flex items-center">
                                            <svg class="hs-accordion-active:hidden hs-accordion-active:text-primary hs-accordion-active:group-hover:text-primary block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-[#8c9097] dark:text-white/50 mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            <svg class="hs-accordion-active:block hs-accordion-active:text-primary hs-accordion-active:group-hover:text-primary hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-[#8c9097] dark:text-white/50 mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 11L8.16086 5.31305C8.35239 5.13625 8.64761 5.13625 8.83914 5.31305L15 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            <span class="capitalize">{{ $module }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <label for="module-{{ $module }}" class="text-sm text-gray-300 me-3 dark:text-[#8c9097] dark:text-white/50">
                                                Activar/Desactivar Todos
                                            </label>
                                            <input type="checkbox" id="module-{{ $module }}" class="ti-switch module-checkbox shrink-0" disabled
                                                   data-module="{{ $module }}">
                                        </div>
                                    </button>
                                    <div id="hs-{{ $module }}-collapse" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-{{ $module }}-heading">
                                        <div class="space-y-2 py-4 px-5">
                                            @foreach ($modulePermissions as $permission)
                                                <div class="flex items-center">
                                                    <input type="checkbox" class="ti-switch shrink-0 !w-[35px] !h-[21px] before:size-4 module-permission module-{{ $module }}"
                                                           id="permission-{{ $module }}-{{ $permission->name }}"
                                                           {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} disabled>
                                                    <label for="permission-{{ $module }}-{{ $permission->name }}" class="text-sm text-gray-500 ms-3 dark:text-[#8c9097] dark:text-white/50">
                                                        {{ ucfirst(str_replace('ver', 'Visualización', str_replace('crear', 'Creación', str_replace('editar', 'Edición', str_replace('eliminar', 'Eliminación', explode('-', $permission->name)[0]))))) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        /* Definimos una clase personalizada para el estado intermedio */
        .ti-switch.intermediate-state:checked {
            background-color: rgba(var(--primary-rgb), 0.1) !important;
            color: rgba(var(--primary-rgb), 0.1) !important;
            border-color: rgba(var(--primary-rgb), 0.2) !important;
        }
        .ti-switch.intermediate-state:focus:checked {
            border-color: rgba(var(--primary-rgb), 0.1) !important;
        }
        .ti-switch.intermediate-state:checked::before {
            background-color: rgb(var(--primary-rgb)) !important;
        }
        .dark .ti-switch.intermediate-state:checked::before {
            background-color: rgb(var(--primary-rgb)) !important;
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

                // Temporariamente expandimos el acordeón para acceder a los permisos
                const accordionContent = document.getElementById(`hs-${module}-collapse`);
                const wasHidden = accordionContent.classList.contains('hidden');
                if (wasHidden) {
                    accordionContent.classList.remove('hidden');
                }

                const modulePermissions = document.querySelectorAll(`.module-${module}`);
                const allChecked = Array.from(modulePermissions).every(p => p.checked);
                const anyChecked = Array.from(modulePermissions).some(p => p.checked);

                // Restaurar el estado colapsado del acordeón si estaba oculto
                if (wasHidden) {
                    accordionContent.classList.add('hidden');
                }

                // Definir las clases base del switch
                const baseClasses = 'ti-switch module-checkbox shrink-0';

                // Si todos los permisos están marcados, el checkbox está completamente activo
                // Si ningún permiso está marcado, el checkbox está completamente desactivado
                // Si algunos permisos están marcados, el checkbox está activo con las clases de estado intermedio
                moduleCheckbox.checked = allChecked || anyChecked;

                // Siempre establecer las clases base
                moduleCheckbox.className = baseClasses;

                if (anyChecked && !allChecked) {
                    // Añadir la clase personalizada para el estado intermedio
                    moduleCheckbox.classList.add('intermediate-state');
                }

                console.log(`Module: ${module}, All Checked: ${allChecked}, Any Checked: ${anyChecked}, Checkbox State: ${moduleCheckbox.checked}, Classes: ${moduleCheckbox.className}`);
            }

            // Inicializar el estado del checkbox "Activar/Desactivar Todos" al cargar la página
            document.querySelectorAll('.module-checkbox').forEach(function (checkbox) {
                const module = checkbox.getAttribute('data-module');
                updateModuleCheckbox(module); // Actualizar el estado inicial
            });

            // Manejar el colapso/expansión del acordeón
            document.querySelectorAll('.hs-accordion-toggle').forEach(function (toggle) {
                toggle.addEventListener('click', function () {
                    const targetId = this.getAttribute('aria-controls');
                    const target = document.getElementById(targetId);
                    const isExpanded = this.getAttribute('aria-expanded') === 'true';

                    // Colapsar todos los acordeones
                    document.querySelectorAll('.hs-accordion-content').forEach(function (content) {
                        content.classList.add('hidden');
                        content.setAttribute('aria-expanded', 'false');
                    });
                    document.querySelectorAll('.hs-accordion-toggle').forEach(function (btn) {
                        btn.setAttribute('aria-expanded', 'false');
                    });

                    // Expandir el acordeón seleccionado si no está ya expandido
                    if (!isExpanded) {
                        target.classList.remove('hidden');
                        this.setAttribute('aria-expanded', 'true');
                    }
                });
            });

            // Colapsar todos los acordeones al cargar la página
            document.querySelectorAll('.hs-accordion-content').forEach(function (content) {
                content.classList.add('hidden');
                content.setAttribute('aria-expanded', 'false');
            });
            document.querySelectorAll('.hs-accordion-toggle').forEach(function (btn) {
                btn.setAttribute('aria-expanded', 'false');
            });
        });
    </script>
@endsection
