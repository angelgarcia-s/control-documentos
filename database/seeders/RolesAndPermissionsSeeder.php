<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos específicos para usuarios
        $permisosUsuarios = [
            'ver-usuarios',
            'crear-usuarios',
            'editar-usuarios',
            'eliminar-usuarios',
        ];

        foreach ($permisosUsuarios as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        $permisosRoles = [
            'ver-roles',
            'crear-roles',
            'editar-roles',
            'eliminar-roles',
        ];

        foreach ($permisosRoles as $permiso) {
            Permission::FirstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para productos
        $permisosProductos = [
            'ver-productos',
            'crear-productos',
            'editar-productos',
            'eliminar-productos',
        ];

        foreach ($permisosProductos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para códigos de barras
        $permisosCodigosBarras = [
            'ver-codigos-barras',
            'crear-codigos-barras',
            'editar-codigos-barras',
            'eliminar-codigos-barras',
            'asignar-codigos-barras',
        ];

        foreach ($permisosCodigosBarras as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para producto-codigos-barras
        $permisosProductoCodigosBarras = [
            'ver-producto-codigos-barras',
            'crear-producto-codigos-barras',
            'editar-producto-codigos-barras',
            'eliminar-producto-codigos-barras',
        ];

        foreach ($permisosProductoCodigosBarras as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para familias
        $permisosFamilias = [
            'ver-familias',
            'crear-familias',
            'editar-familias',
            'eliminar-familias',
        ];

        foreach ($permisosFamilias as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para categorías
        $permisosCategorias = [
            'ver-categorias',
            'crear-categorias',
            'editar-categorias',
            'eliminar-categorias',
        ];

        foreach ($permisosCategorias as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para colores
        $permisosColores = [
            'ver-colores',
            'crear-colores',
            'editar-colores',
            'eliminar-colores',
        ];

        foreach ($permisosColores as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para tamaños
        $permisosTamanos = [
            'ver-tamanos',
            'crear-tamanos',
            'editar-tamanos',
            'eliminar-tamanos',
        ];

        foreach ($permisosTamanos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para unidades
        $permisosUnidades = [
            'ver-unidades',
            'crear-unidades',
            'editar-unidades',
            'eliminar-unidades',
        ];

        foreach ($permisosUnidades as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para tipos de empaque
        $permisosTiposEmpaque = [
            'ver-tipos-empaque',
            'crear-tipos-empaque',
            'editar-tipos-empaque',
            'eliminar-tipos-empaque',
        ];

        foreach ($permisosTiposEmpaque as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para empaques
        $permisosEmpaques = [
            'ver-empaques',
            'crear-empaques',
            'editar-empaques',
            'eliminar-empaques',
        ];

        foreach ($permisosEmpaques as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para tipos de sello
        $permisosTiposSello = [
            'ver-tipos-sello',
            'crear-tipos-sello',
            'editar-tipos-sello',
            'eliminar-tipos-sello',
        ];

        foreach ($permisosTiposSello as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para acabados
        $permisosAcabados = [
            'ver-acabados',
            'crear-acabados',
            'editar-acabados',
            'eliminar-acabados',
        ];

        foreach ($permisosAcabados as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para materiales
        $permisosMateriales = [
            'ver-materiales',
            'crear-materiales',
            'editar-materiales',
            'eliminar-materiales',
        ];

        foreach ($permisosMateriales as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para barnices
        $permisosBarnices = [
            'ver-barnices',
            'crear-barnices',
            'editar-barnices',
            'eliminar-barnices',
        ];

        foreach ($permisosBarnices as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear permisos para proveedores
        $permisosProveedores = [
            'ver-proveedores',
            'crear-proveedores',
            'editar-proveedores',
            'eliminar-proveedores',
        ];

        foreach ($permisosProveedores as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear roles
        $superAdmin = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $visualizadorProductos = Role::firstOrCreate(['name' => 'Visualizador de Productos']);
        $creadorCodigos = Role::firstOrCreate(['name' => 'Creador de Códigos']);

        // Asignar permisos a los roles
        $superAdmin->syncPermissions(Permission::all());

        $visualizadorProductos->syncPermissions([
            'ver-productos',
            'ver-producto-codigos-barras',
            'ver-familias',
            'ver-categorias',
            'ver-colores',
            'ver-tamanos',
            'ver-unidades',
            'ver-tipos-empaque',
            'ver-empaques',
            'ver-tipos-sello',
            'ver-acabados',
            'ver-materiales',
            'ver-barnices',
            'ver-proveedores',
        ]);

        $creadorCodigos->syncPermissions([
            'ver-codigos-barras',
            'crear-codigos-barras',
            'editar-codigos-barras',
            'eliminar-codigos-barras',
            'asignar-codigos-barras',
            'ver-producto-codigos-barras',
            'crear-producto-codigos-barras',
            'editar-producto-codigos-barras',
            'eliminar-producto-codigos-barras',
        ]);

        // Crear un usuario SuperAdmin
        $superAdminUser = User::firstOrCreate(
            ['email' => 'agarcia@ambiderm.com'],
            [
                'name' => 'SuperAdmin',
                'password' => bcrypt('Ambiderm*'),
            ]
        );
        $superAdminUser->assignRole('SuperAdmin');

        // Crear un usuario Visualizador de Productos
        $visualizadorUser = User::firstOrCreate(
            ['email' => 'visualizador@ambiderm.com'],
            [
                'name' => 'Visualizador',
                'password' => bcrypt('Ambiderm*'),
            ]
        );
        $visualizadorUser->assignRole('Visualizador de Productos');

        // Crear un usuario Creador de Códigos
        $creadorCodigosUser = User::firstOrCreate(
            ['email' => 'creador@ambiderm.com'],
            [
                'name' => 'Creador de Códigos',
                'password' => bcrypt('Ambiderm*'),
            ]
        );
        $creadorCodigosUser->assignRole('Creador de Códigos');
    }
}
