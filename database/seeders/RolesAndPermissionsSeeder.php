<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Resetear caché de permisos para evitar conflictos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Definir los módulos y sus descripciones
        $basePermisos = [
            'usuarios' => 'usuarios',
            'roles' => 'roles de usuarios',
            'productos' => 'productos',
            'codigos-barras' => 'códigos de barras',
            'producto-codigos-barras' => 'productos con códigos de barras',
            'familias' => 'familias de productos',
            'categorias' => 'categorías de productos',
            'colores' => 'colores de productos',
            'tamanos' => 'tamaños de productos',
            'unidades' => 'unidades de productos',
            'tipos-empaque' => 'tipos de empaque',
            'empaques' => 'empaques',
            'tipos-sello' => 'tipos de sello',
            'acabados' => 'acabados',
            'materiales' => 'materiales',
            'barnices' => 'barnices',
            'proveedores' => 'proveedores',
            'permisos' => 'permisos',
            'administracion' => 'administracion',
        ];

        // Definir las acciones disponibles para cada módulo
        $acciones = [
            'list' => 'Listar',
            'create' => 'Crear',
            'edit' => 'Editar',
            'show' => 'Ver',
            'destroy' => 'Eliminar',
            'download' => 'Descargar',
            'import' => 'Importar',
        ];

        // Crear permisos base para cada módulo y acción
        foreach ($basePermisos as $permiso => $descripcion) {
            // Transformar el nombre del módulo para la categoría, reemplazando '-' por ' de '
            $categoryName = str_replace('-', ' de ', $permiso);

            foreach ($acciones as $accion => $accionDescripcion) {
                Permission::updateOrCreate(
                    ['name' => $permiso . '-' . $accion],
                    [
                        'description' => $accionDescripcion . ' ' . $descripcion,
                        'category' => $categoryName,
                    ]
                );
            }
        }

        // Crear permisos individuales (que no encajan en el formato [módulo]-[acción])
        Permission::updateOrCreate(
            ['name' => 'asignar-codigos-barras'],
            [
                'description' => 'Asignar códigos de barras a productos',
                'category' => 'Otros', // Asignar la categoría "Otros"
            ]
        );

        // Crear roles y asignar permisos
        // SuperAdmin: tiene todos los permisos
        $superAdminRole = Role::updateOrCreate(['name' => 'SuperAdmin']);
        $superAdminRole->syncPermissions(Permission::all());

        // Visualizador de Productos: solo puede visualizar datos
        $visualizadorProductosRole = Role::updateOrCreate(['name' => 'Visualizador de Productos']);
        $visualizadorPermissions = Permission::whereIn('name', [
            'productos-list', 'productos-show',
            'producto-codigos-barras-list', 'producto-codigos-barras-show',
            'familias-list', 'familias-show',
            'categorias-list', 'categorias-show',
            'colores-list', 'colores-show',
            'tamanos-list', 'tamanos-show',
            'unidades-list', 'unidades-show',
            'tipos-empaque-list', 'tipos-empaque-show',
            'empaques-list', 'empaques-show',
            'tipos-sello-list', 'tipos-sello-show',
            'acabados-list', 'acabados-show',
            'materiales-list', 'materiales-show',
            'barnices-list', 'barnices-show',
            'proveedores-list', 'proveedores-show',
        ])->pluck('id')->toArray();
        $visualizadorProductosRole->syncPermissions($visualizadorPermissions);

        // Creador de Códigos: puede gestionar códigos de barras
        $creadorCodigosRole = Role::updateOrCreate(['name' => 'Creador de Códigos']);
        $creadorCodigosPermissions = Permission::whereIn('name', [
            'codigos-barras-list', 'codigos-barras-create', 'codigos-barras-edit', 'codigos-barras-show', 'codigos-barras-destroy',
            'producto-codigos-barras-list', 'producto-codigos-barras-create', 'producto-codigos-barras-edit', 'producto-codigos-barras-show', 'producto-codigos-barras-destroy',
            'asignar-codigos-barras',
        ])->pluck('id')->toArray();
        $creadorCodigosRole->syncPermissions($creadorCodigosPermissions);

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

        // Resetear caché después de crear permisos y roles
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
