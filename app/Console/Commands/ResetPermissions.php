<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\NombreVisualCategoriaPermiso;

class ResetPermissions extends Command
{
    protected $signature = 'permissions:reset';
    protected $description = 'Reset all permissions, roles, and related data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Limpiando datos de permisos y roles...');

        // Desactivar las restricciones de clave foránea
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncar las tablas relacionadas con permisos y roles
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        Permission::truncate();
        Role::truncate();
        NombreVisualCategoriaPermiso::truncate();

        // Reactivar las restricciones de clave foránea
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->info('Datos limpiados exitosamente.');

        // Ejecutar el seeder
        $this->info('Ejecutando el seeder RolesAndPermissionsSeeder...');
        $this->call('db:seed', ['--class' => 'RolesAndPermissionsSeeder']);

        $this->info('Permisos y roles reiniciados correctamente.');
    }
}
