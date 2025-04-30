<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Resetear caché de permisos para evitar problemas
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Definir permisos granulares para todos los módulos
        $permissions = [
            // Productos
            'ver-productos',
            'crear-productos',
            'editar-productos',
            'eliminar-productos',
            // Códigos de barras
            'ver-codigos-barras',
            'crear-codigos-barras',
            'editar-codigos-barras',
            'eliminar-codigos-barras',
            'asignar-codigos-barras', // Para asignar códigos a productos
            // Producto-Codigos-Barras (relación)
            'ver-producto-codigos-barras',
            'crear-producto-codigos-barras',
            'editar-producto-codigos-barras',
            'eliminar-producto-codigos-barras',
            // Familias
            'ver-familias',
            'crear-familias',
            'editar-familias',
            'eliminar-familias',
            // Categorías
            'ver-categorias',
            'crear-categorias',
            'editar-categorias',
            'eliminar-categorias',
            // Colores
            'ver-colores',
            'crear-colores',
            'editar-colores',
            'eliminar-colores',
            // Tamaños
            'ver-tamanos',
            'crear-tamanos',
            'editar-tamanos',
            'eliminar-tamanos',
            // Unidades (Unidades de Medida)
            'ver-unidades',
            'crear-unidades',
            'editar-unidades',
            'eliminar-unidades',
            // Tipos de Empaque
            'ver-tipos-empaque',
            'crear-tipos-empaque',
            'editar-tipos-empaque',
            'eliminar-tipos-empaque',
            // Empaques
            'ver-empaques',
            'crear-empaques',
            'editar-empaques',
            'eliminar-empaques',
            // Tipos de Sello
            'ver-tipos-sello',
            'crear-tipos-sello',
            'editar-tipos-sello',
            'eliminar-tipos-sello',
            // Acabados
            'ver-acabados',
            'crear-acabados',
            'editar-acabados',
            'eliminar-acabados',
            // Materiales
            'ver-materiales',
            'crear-materiales',
            'editar-materiales',
            'eliminar-materiales',
            // Barnices
            'ver-barnices',
            'crear-barnices',
            'editar-barnices',
            'eliminar-barnices',
            // Proveedores
            'ver-proveedores',
            'crear-proveedores',
            'editar-proveedores',
            'eliminar-proveedores',
            // PrintCards
            'ver-printcards',
            // Gestión de usuarios y roles (para administradores)
            'gestionar-usuarios',
            'ver-usuarios',
            'crear-usuarios',
            'editar-usuarios',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles modulares y asignar permisos
        // Rol: Creador de Códigos
        $roleCreadorCodigos = Role::firstOrCreate(['name' => 'Creador de Códigos']);
        $roleCreadorCodigos->syncPermissions([
            'ver-codigos-barras',
            'crear-codigos-barras',
            'editar-codigos-barras',
            'asignar-codigos-barras',
        ]);

        // Rol: Visualizador de Productos
        $roleVisualizadorProductos = Role::firstOrCreate(['name' => 'Visualizador de Productos']);
        $roleVisualizadorProductos->syncPermissions([
            'ver-productos',
        ]);

        // Rol: Visualizador de PrintCards
        $roleVisualizadorPrintCards = Role::firstOrCreate(['name' => 'Visualizador de PrintCards']);
        $roleVisualizadorPrintCards->syncPermissions([
            'ver-printcards',
        ]);

        // Rol: Administrador (acceso amplio, pero menos que SuperAdmin si decides restringirlo)
        $roleAdmin = Role::firstOrCreate(['name' => 'Administrador']);
        $roleAdmin->syncPermissions(Permission::all());

        // Rol: SuperAdmin (acceso total)
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $roleSuperAdmin->syncPermissions(Permission::all());
    }
}
