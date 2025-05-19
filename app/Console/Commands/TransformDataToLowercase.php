<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Acabado;
use App\Models\Barniz;
use App\Models\Categoria;
use App\Models\CodigoBarra;
use App\Models\Color;
use App\Models\ColorEmpaque;
use App\Models\Empaque;
use App\Models\FamiliaProducto;
use App\Models\Material;
use App\Models\Producto;
use App\Models\ProductoCodigosBarras;
use App\Models\Proveedor;
use App\Models\Tamano;
use App\Models\ClasificacionEnvase;
use App\Models\TipoSello;
use App\Models\UnidadMedida;
use App\Models\User;

class TransformDataToLowercase extends Command
{
    protected $signature = 'data:transform-lowercase';
    protected $description = 'Transforma los datos textuales existentes en las tablas del sistema a minúsculas';

    public function handle()
    {
        $this->info('Iniciando transformación de datos a minúsculas...');

        // Transformar Acabado
        $this->info('Transformando tabla acabados...');
        Acabado::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar Barniz
        $this->info('Transformando tabla barnices...');
        Barniz::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar Categoria
        $this->info('Transformando tabla categorias...');
        Categoria::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar Color
        $this->info('Transformando tabla colores...');
        Color::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar ColorEmpaque
        $this->info('Transformando tabla colores_empaque...');
        ColorEmpaque::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar Empaque
        $this->info('Transformando tabla empaques...');
        Empaque::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar FamiliaProducto
        $this->info('Transformando tabla familia_productos...');
        FamiliaProducto::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar Material
        $this->info('Transformando tabla materiales...');
        Material::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar Producto
        $this->info('Transformando tabla productos...');
        Producto::query()->update([
            'descripcion' => \DB::raw('LOWER(descripcion)'),
            'nombre_corto' => \DB::raw('LOWER(nombre_corto)'),
        ]);

        // Transformar CodigoBarra (tabla codigos_barras)
        $this->info('Transformando tabla codigos_barras...');
        CodigoBarra::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
            'clasificacion_envase' => \DB::raw('LOWER(clasificacion_envase)'),
            'empaque' => \DB::raw('LOWER(empaque)'),
            'contenido' => \DB::raw('LOWER(contenido)'),
            'nombre_corto' => \DB::raw('LOWER(nombre_corto)'),
        ]);

        // Transformar ProductoCodigosBarras
        $this->info('Transformando tabla producto_codigos_barras...');
        ProductoCodigosBarras::query()->update([
            'clasificacion_envase' => \DB::raw('LOWER(clasificacion_envase)'),
            'contenido' => \DB::raw('LOWER(contenido)'),
        ]);

        // Transformar Proveedor
        $this->info('Transformando tabla proveedores...');
        Proveedor::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
            'abreviacion' => \DB::raw('LOWER(abreviacion)'),
        ]);

        // Transformar Tamano
        $this->info('Transformando tabla tamanos...');
        Tamano::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar clasificacionEnvase
        $this->info('Transformando tabla tipos_empaque...');
        ClasificacionEnvase::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar TipoSello
        $this->info('Transformando tabla tipos_sello...');
        TipoSello::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar UnidadMedida
        $this->info('Transformando tabla unidades_medida...');
        UnidadMedida::query()->update([
            'nombre' => \DB::raw('LOWER(nombre)'),
        ]);

        // Transformar User
        $this->info('Transformando tabla users...');
        User::query()->update([
            'name' => \DB::raw('LOWER(name)'),
            'email' => \DB::raw('LOWER(email)'),
        ]);

        $this->info('Transformación de datos completada.');
    }
}
