<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\UielementsController;
use App\Http\Controllers\UtilitiesController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\AdvanceduiController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\IconsController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\FamiliasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ColoresController;
use App\Http\Controllers\TamanosController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\ClasificacionesEnvasesController;
use App\Http\Controllers\EmpaquesController;
use App\Http\Controllers\TiposSelloController;
use App\Http\Controllers\AcabadosController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\BarnicesController;
use App\Http\Controllers\CodigosBarrasController;
use App\Http\Controllers\ProductoCodigosBarrasController;
use App\Http\Controllers\PrintCardsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\CategoriasPermisosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Ruta de prueba
Route::get('/test', function () {
    return response()->json(['success' => true, 'message' => 'Prueba exitosa']);
});

// Ruta raíz: Redirige al login si no está autenticado, o al dashboard si está autenticado
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Rutas de autenticación (definidas en auth.php)
require __DIR__ . '/auth.php';

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardsController::class, 'index'])->name('dashboard')->middleware('can:dashboard-show');
    });

    // Perfil
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('can:profile-edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update')->middleware('can:profile-update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('can:profile-destroy');
    });

    // Rutas para Gestión de Usuarios
    Route::prefix('usuarios')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('usuarios.index')->middleware('can:usuarios-list');
        Route::get('/crear', [UsersController::class, 'create'])->name('usuarios.create')->middleware('can:usuarios-create');
        Route::post('/', [UsersController::class, 'store'])->name('usuarios.store')->middleware('can:usuarios-create');
        Route::get('/{user}', [UsersController::class, 'show'])->name('usuarios.show')->middleware('can:usuarios-show');
        Route::get('/{user}/editar', [UsersController::class, 'edit'])->name('usuarios.edit')->middleware('can:usuarios-edit');
        Route::put('/{user}', [UsersController::class, 'update'])->name('usuarios.update')->middleware('can:usuarios-edit');
        Route::delete('/{user}', [UsersController::class, 'destroy'])->name('usuarios.destroy')->middleware('can:usuarios-destroy');
    });

    // Rutas para Gestión de Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [RolesController::class, 'index'])->name('roles.index')->middleware('can:roles-list');
        Route::get('/crear', [RolesController::class, 'create'])->name('roles.create')->middleware('can:roles-create');
        Route::post('/', [RolesController::class, 'store'])->name('roles.store')->middleware('can:roles-create');
        Route::get('/{role}', [RolesController::class, 'show'])->name('roles.show')->middleware('can:roles-show');
        Route::get('/{role}/editar', [RolesController::class, 'edit'])->name('roles.edit')->middleware('can:roles-edit');
        Route::put('/{role}', [RolesController::class, 'update'])->name('roles.update')->middleware('can:roles-edit');
        Route::delete('/{role}', [RolesController::class, 'destroy'])->name('roles.destroy')->middleware('can:roles-destroy');
    });

    // Rutas para Gestión de Permisos
    Route::prefix('permisos')->group(function () {
        Route::get('/', [PermissionsController::class, 'index'])->name('permisos.index')->middleware('can:permisos-list');
        Route::get('/crear', [PermissionsController::class, 'create'])->name('permisos.create')->middleware('can:permisos-create');
        Route::post('/', [PermissionsController::class, 'store'])->name('permisos.store')->middleware('can:permisos-create');
        Route::get('/{permission}/editar', [PermissionsController::class, 'edit'])->name('permisos.edit')->middleware('can:permisos-edit');
        Route::put('/{permission}', [PermissionsController::class, 'update'])->name('permisos.update')->middleware('can:permisos-edit');

        // Rutas para Gestión de Nombres de Visualización de Categorías
        Route::prefix('categorias')->group(function () {
            Route::get('/edit', [CategoriasPermisosController::class, 'edit'])->name('categorias-permisos.edit')->middleware('can:permisos-edit');
            Route::post('/', [CategoriasPermisosController::class, 'update'])->name('categorias-permisos.update')->middleware(['can:permisos-edit', \App\Http\Middleware\DebugRequest::class]);
        });
    });

    // Rutas para Productos
    Route::prefix('productos')->group(function () {
        Route::get('/', [ProductosController::class, 'index'])->name('productos.index')->middleware('can:productos-list');
        Route::get('/crear', [ProductosController::class, 'create'])->name('productos.create')->middleware('can:productos-create');
        Route::post('/', [ProductosController::class, 'store'])->name('productos.store')->middleware('can:productos-create');
        Route::get('/{producto}', [ProductosController::class, 'show'])->name('productos.show')->middleware('can:productos-show');
        Route::get('/{producto}/editar', [ProductosController::class, 'edit'])->name('productos.edit')->middleware('can:productos-edit');
        Route::put('/{producto}', [ProductosController::class, 'update'])->name('productos.update')->middleware('can:productos-edit');
        Route::delete('/{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy')->middleware('can:productos-destroy');
    });

    // Rutas para Códigos de Barras
    Route::prefix('codigos-barras')->group(function () {
        Route::get('/', [CodigosBarrasController::class, 'index'])->name('codigos-barras.index')->middleware('can:codigos-barras-list');
        Route::get('/crear', [CodigosBarrasController::class, 'create'])->name('codigos-barras.create')->middleware('can:codigos-barras-create');
        Route::post('/', [CodigosBarrasController::class, 'store'])->name('codigos-barras.store')->middleware('can:codigos-barras-create');
        Route::get('/{codigoBarra}', [CodigosBarrasController::class, 'show'])->name('codigos-barras.show')->middleware('can:codigos-barras-show');
        Route::get('/{codigoBarra}/editar', [CodigosBarrasController::class, 'edit'])->name('codigos-barras.edit')->middleware('can:codigos-barras-edit');
        Route::put('/{codigoBarra}', [CodigosBarrasController::class, 'update'])->name('codigos-barras.update')->middleware('can:codigos-barras-edit');
        Route::delete('/{codigoBarra}', [CodigosBarrasController::class, 'destroy'])->name('codigos-barras.destroy')->middleware('can:codigos-barras-destroy');

        Route::get('/asignar/{sku}', [ProductoCodigosBarrasController::class, 'create'])->name('codigos-barras.asignar')->middleware('can:asignar-codigos-barras');
        Route::post('/asignar/{sku}', [ProductoCodigosBarrasController::class, 'store'])->name('codigos-barras.asignar.store')->middleware('can:asignar-codigos-barras');
    });

    // Rutas para Producto-Codigos-Barras
    Route::prefix('producto-codigos-barras')->group(function () {
        Route::get('/', [ProductoCodigosBarrasController::class, 'index'])->name('producto-codigos-barras.index')->middleware('can:producto-codigos-barras-list');
        Route::get('/crear', [ProductoCodigosBarrasController::class, 'create'])->name('producto-codigos-barras.create')->middleware('can:producto-codigos-barras-create');
        Route::post('/', [ProductoCodigosBarrasController::class, 'store'])->name('producto-codigos-barras.store')->middleware('can:producto-codigos-barras-create');
        Route::get('/{productoCodigosBarra}', [ProductoCodigosBarrasController::class, 'show'])->name('producto-codigos-barras.show')->middleware('can:producto-codigos-barras-show');
        Route::get('/{productoCodigosBarra}/editar', [ProductoCodigosBarrasController::class, 'edit'])->name('producto-codigos-barras.edit')->middleware('can:producto-codigos-barras-edit');
        Route::put('/{productoCodigosBarra}', [ProductoCodigosBarrasController::class, 'update'])->name('producto-codigos-barras.update')->middleware('can:producto-codigos-barras-edit');
        Route::delete('/{productoCodigosBarra}', [ProductoCodigosBarrasController::class, 'destroy'])->name('producto-codigos-barras.destroy')->middleware('can:producto-codigos-barras-destroy');
    });

    // Rutas para Familias
    Route::prefix('familias')->group(function () {
        Route::get('/', [FamiliasController::class, 'index'])->name('familias.index')->middleware('can:familias-list');
        Route::get('/crear', [FamiliasController::class, 'create'])->name('familias.create')->middleware('can:familias-create');
        Route::post('/', [FamiliasController::class, 'store'])->name('familias.store')->middleware('can:familias-create');
        Route::get('/{familia}', [FamiliasController::class, 'show'])->name('familias.show')->middleware('can:familias-show');
        Route::get('/{familia}/editar', [FamiliasController::class, 'edit'])->name('familias.edit')->middleware('can:familias-edit');
        Route::put('/{familia}', [FamiliasController::class, 'update'])->name('familias.update')->middleware('can:familias-edit');
        Route::delete('/{familia}', [FamiliasController::class, 'destroy'])->name('familias.destroy')->middleware('can:familias-destroy');
        Route::get('/{familia}/productos', [FamiliasController::class, 'productos'])->name('familias.productos')->middleware('can:productos-list');
    });

    // Rutas para Categorías
    Route::prefix('categorias')->group(function () {
        Route::get('/', [CategoriasController::class, 'index'])->name('categorias.index')->middleware('can:categorias-list');
        Route::get('/crear', [CategoriasController::class, 'create'])->name('categorias.create')->middleware('can:categorias-create');
        Route::post('/', [CategoriasController::class, 'store'])->name('categorias.store')->middleware('can:categorias-create');
        Route::get('/{categoria}', [CategoriasController::class, 'show'])->name('categorias.show')->middleware('can:categorias-show');
        Route::get('/{categoria}/editar', [CategoriasController::class, 'edit'])->name('categorias.edit')->middleware('can:categorias-edit');
        Route::put('/{categoria}', [CategoriasController::class, 'update'])->name('categorias.update')->middleware('can:categorias-edit');
        Route::delete('/{categoria}', [CategoriasController::class, 'destroy'])->name('categorias.destroy')->middleware('can:categorias-destroy');
    });

    // Rutas para Colores
    Route::prefix('colores')->group(function () {
        Route::get('/', [ColoresController::class, 'index'])->name('colores.index')->middleware('can:colores-list');
        Route::get('/crear', [ColoresController::class, 'create'])->name('colores.create')->middleware('can:colores-create');
        Route::post('/', [ColoresController::class, 'store'])->name('colores.store')->middleware('can:colores-create');
        Route::get('/{color}', [ColoresController::class, 'show'])->name('colores.show')->middleware('can:colores-show');
        Route::get('/{color}/editar', [ColoresController::class, 'edit'])->name('colores.edit')->middleware('can:colores-edit');
        Route::put('/{color}', [ColoresController::class, 'update'])->name('colores.update')->middleware('can:colores-edit');
        Route::delete('/{color}', [ColoresController::class, 'destroy'])->name('colores.destroy')->middleware('can:colores-destroy');
    });

    // Rutas para Tamaños
    Route::prefix('tamanos')->group(function () {
        Route::get('/', [TamanosController::class, 'index'])->name('tamanos.index')->middleware('can:tamanos-list');
        Route::get('/crear', [TamanosController::class, 'create'])->name('tamanos.create')->middleware('can:tamanos-create');
        Route::post('/', [TamanosController::class, 'store'])->name('tamanos.store')->middleware('can:tamanos-create');
        Route::get('/{tamano}', [TamanosController::class, 'show'])->name('tamanos.show')->middleware('can:tamanos-show');
        Route::get('/{tamano}/editar', [TamanosController::class, 'edit'])->name('tamanos.edit')->middleware('can:tamanos-edit');
        Route::put('/{tamano}', [TamanosController::class, 'update'])->name('tamanos.update')->middleware('can:tamanos-edit');
        Route::delete('/{tamano}', [TamanosController::class, 'destroy'])->name('tamanos.destroy')->middleware('can:tamanos-destroy');
    });

    // Rutas para Unidades (Unidades de Medida)
    Route::prefix('unidades')->group(function () {
        Route::get('/', [UnidadMedidaController::class, 'index'])->name('unidades.index')->middleware('can:unidades-list');
        Route::get('/crear', [UnidadMedidaController::class, 'create'])->name('unidades.create')->middleware('can:unidades-create');
        Route::post('/', [UnidadMedidaController::class, 'store'])->name('unidades.store')->middleware('can:unidades-create');
        Route::get('/{unidad}', [UnidadMedidaController::class, 'show'])->name('unidades.show')->middleware('can:unidades-show');
        Route::get('/{unidad}/editar', [UnidadMedidaController::class, 'edit'])->name('unidades.edit')->middleware('can:unidades-edit');
        Route::put('/{unidad}', [UnidadMedidaController::class, 'update'])->name('unidades.update')->middleware('can:unidades-edit');
        Route::delete('/{unidad}', [UnidadMedidaController::class, 'destroy'])->name('unidades.destroy')->middleware('can:unidades-destroy');
    });

    // Rutas para Clasificaciones de envase
    Route::prefix('clasificaciones-envases')->group(function () {
        Route::get('/', [ClasificacionesEnvasesController::class, 'index'])->name('clasificaciones-envases.index')->middleware('can:clasificaciones-envases-list');
        Route::get('/crear', [ClasificacionesEnvasesController::class, 'create'])->name('clasificaciones-envases.create')->middleware('can:clasificaciones-envases-create');
        Route::post('/', [ClasificacionesEnvasesController::class, 'store'])->name('clasificaciones-envases.store')->middleware('can:clasificaciones-envases-create');
        Route::get('/{clasificacion_envase}', [ClasificacionesEnvasesController::class, 'show'])->name('clasificaciones-envases.show')->middleware('can:clasificaciones-envases-show');
        Route::get('/{clasificacion_envase}/editar', [ClasificacionesEnvasesController::class, 'edit'])->name('clasificaciones-envases.edit')->middleware('can:clasificaciones-envases-edit');
        Route::put('/{clasificacion_envase}', [ClasificacionesEnvasesController::class, 'update'])->name('clasificaciones-envases.update')->middleware('can:clasificaciones-envases-edit');
        Route::delete('/{clasificacion_envase}', [ClasificacionesEnvasesController::class, 'destroy'])->name('clasificaciones-envases.destroy')->middleware('can:clasificaciones-envases-destroy');
    });

    // Rutas para Empaques
    Route::prefix('empaques')->group(function () {
        Route::get('/', [EmpaquesController::class, 'index'])->name('empaques.index')->middleware('can:empaques-list');
        Route::get('/crear', [EmpaquesController::class, 'create'])->name('empaques.create')->middleware('can:empaques-create');
        Route::post('/', [EmpaquesController::class, 'store'])->name('empaques.store')->middleware('can:empaques-create');
        Route::get('/{empaque}', [EmpaquesController::class, 'show'])->name('empaques.show')->middleware('can:empaques-show');
        Route::get('/{empaque}/editar', [EmpaquesController::class, 'edit'])->name('empaques.edit')->middleware('can:empaques-edit');
        Route::put('/{empaque}', [EmpaquesController::class, 'update'])->name('empaques.update')->middleware('can:empaques-edit');
        Route::delete('/{empaque}', [EmpaquesController::class, 'destroy'])->name('empaques.destroy')->middleware('can:empaques-destroy');
    });

    // Rutas para Tipos de Sello
    Route::prefix('tipos-sello')->group(function () {
        Route::get('/', [TiposSelloController::class, 'index'])->name('tipos-sello.index')->middleware('can:tipos-sello-list');
        Route::get('/crear', [TiposSelloController::class, 'create'])->name('tipos-sello.create')->middleware('can:tipos-sello-create');
        Route::post('/', [TiposSelloController::class, 'store'])->name('tipos-sello.store')->middleware('can:tipos-sello-create');
        Route::get('/{tipo_sello}', [TiposSelloController::class, 'show'])->name('tipos-sello.show')->middleware('can:tipos-sello-show');
        Route::get('/{tipo_sello}/editar', [TiposSelloController::class, 'edit'])->name('tipos-sello.edit')->middleware('can:tipos-sello-edit');
        Route::put('/{tipo_sello}', [TiposSelloController::class, 'update'])->name('tipos-sello.update')->middleware('can:tipos-sello-edit');
        Route::delete('/{tipo_sello}', [TiposSelloController::class, 'destroy'])->name('tipos-sello.destroy')->middleware('can:tipos-sello-destroy');
    });

    // Rutas para Acabados
    Route::prefix('acabados')->group(function () {
        Route::get('/', [AcabadosController::class, 'index'])->name('acabados.index')->middleware('can:acabados-list');
        Route::get('/crear', [AcabadosController::class, 'create'])->name('acabados.create')->middleware('can:acabados-create');
        Route::post('/', [AcabadosController::class, 'store'])->name('acabados.store')->middleware('can:acabados-create');
        Route::get('/{acabado}', [AcabadosController::class, 'show'])->name('acabados.show')->middleware('can:acabados-show');
        Route::get('/{acabado}/editar', [AcabadosController::class, 'edit'])->name('acabados.edit')->middleware('can:acabados-edit');
        Route::put('/{acabado}', [AcabadosController::class, 'update'])->name('acabados.update')->middleware('can:acabados-edit');
        Route::delete('/{acabado}', [AcabadosController::class, 'destroy'])->name('acabados.destroy')->middleware('can:acabados-destroy');
    });

    // Rutas para Materiales
    Route::prefix('materiales')->group(function () {
        Route::get('/', [MaterialesController::class, 'index'])->name('materiales.index')->middleware('can:materiales-list');
        Route::get('/crear', [MaterialesController::class, 'create'])->name('materiales.create')->middleware('can:materiales-create');
        Route::post('/', [MaterialesController::class, 'store'])->name('materiales.store')->middleware('can:materiales-create');
        Route::get('/{material}', [MaterialesController::class, 'show'])->name('materiales.show')->middleware('can:materiales-show');
        Route::get('/{material}/editar', [MaterialesController::class, 'edit'])->name('materiales.edit')->middleware('can:materiales-edit');
        Route::put('/{material}', [MaterialesController::class, 'update'])->name('materiales.update')->middleware('can:materiales-edit');
        Route::delete('/{material}', [MaterialesController::class, 'destroy'])->name('materiales.destroy')->middleware('can:materiales-destroy');
    });

    // Rutas para Barnices
    Route::prefix('barnices')->group(function () {
        Route::get('/', [BarnicesController::class, 'index'])->name('barnices.index')->middleware('can:barnices-list');
        Route::get('/crear', [BarnicesController::class, 'create'])->name('barnices.create')->middleware('can:barnices-create');
        Route::post('/', [BarnicesController::class, 'store'])->name('barnices.store')->middleware('can:barnices-create');
        Route::get('/{barniz}', [BarnicesController::class, 'show'])->name('barnices.show')->middleware('can:barnices-show');
        Route::get('/{barniz}/editar', [BarnicesController::class, 'edit'])->name('barnices.edit')->middleware('can:barnices-edit');
        Route::put('/{barniz}', [BarnicesController::class, 'update'])->name('barnices.update')->middleware('can:barnices-edit');
        Route::delete('/{barniz}', [BarnicesController::class, 'destroy'])->name('barnices.destroy')->middleware('can:barnices-destroy');
    });

    // Rutas para Proveedores
    Route::prefix('proveedores')->group(function () {
        Route::get('/', [ProveedoresController::class, 'index'])->name('proveedores.index')->middleware('can:proveedores-list');
        Route::get('/crear', [ProveedoresController::class, 'create'])->name('proveedores.create')->middleware('can:proveedores-create');
        Route::post('/', [ProveedoresController::class, 'store'])->name('proveedores.store')->middleware('can:proveedores-create');
        Route::get('/{proveedor}', [ProveedoresController::class, 'show'])->name('proveedores.show')->middleware('can:proveedores-show');
        Route::get('/{proveedor}/editar', [ProveedoresController::class, 'edit'])->name('proveedores.edit')->middleware('can:proveedores-edit');
        Route::put('/{proveedor}', [ProveedoresController::class, 'update'])->name('proveedores.update')->middleware('can:proveedores-edit');
        Route::delete('/{proveedor}', [ProveedoresController::class, 'destroy'])->name('proveedores.destroy')->middleware('can:proveedores-destroy');
    });

    // Rutas para PrintCards
    Route::prefix('print-cards')->group(function () {
        Route::get('/', [PrintCardsController::class, 'index'])->name('print-cards.index')->middleware('can:print-cards-list');
        Route::get('/crear', [PrintCardsController::class, 'create'])->name('print-cards.create')->middleware('can:print-cards-create');
        Route::post('/', [PrintCardsController::class, 'store'])->name('print-cards.store')->middleware('can:print-cards-create');
        Route::get('/{printCard}', [PrintCardsController::class, 'show'])->name('print-cards.show')->middleware('can:print-cards-show');
        Route::get('/{printCard}/editar', [PrintCardsController::class, 'edit'])->name('print-cards.edit')->middleware('can:print-cards-edit');
        Route::put('/{printCard}', [PrintCardsController::class, 'update'])->name('print-cards.update')->middleware('can:print-cards-edit');
        Route::delete('/{printCard}', [PrintCardsController::class, 'destroy'])->name('print-cards.destroy')->middleware('can:print-cards-destroy');
        Route::get('/por-codigo-barra/{productoCodigoBarra}', [PrintCardsController::class, 'printCardsPorCodigoBarra'])->name('print-cards.por-codigo-barra')->middleware('can:print-cards-list');
    });

    // Rutas para PrintCardRevisions
    Route::prefix('print-card-revisiones')->group(function () {
        Route::get('/', [App\Http\Controllers\PrintCardRevisionController::class, 'index'])->name('print-card-revisiones.index')->middleware('can:print-card-revisiones-list');
        Route::get('/print-card/{printCard}/crear', [App\Http\Controllers\PrintCardRevisionController::class, 'create'])->name('print-card-revisiones.create')->middleware('can:print-card-revisiones-create');
        Route::post('/print-card/{printCard}', [App\Http\Controllers\PrintCardRevisionController::class, 'store'])->name('print-card-revisiones.store')->middleware('can:print-card-revisiones-create');
        Route::get('/{printCardRevision}', [App\Http\Controllers\PrintCardRevisionController::class, 'show'])->name('print-card-revisiones.show')->middleware('can:print-card-revisiones-show');
        Route::get('/{printCardRevision}/editar', [App\Http\Controllers\PrintCardRevisionController::class, 'edit'])->name('print-card-revisiones.edit')->middleware('can:print-card-revisiones-edit');
        Route::put('/{printCardRevision}', [App\Http\Controllers\PrintCardRevisionController::class, 'update'])->name('print-card-revisiones.update')->middleware('can:print-card-revisiones-edit');
        Route::delete('/{printCardRevision}', [App\Http\Controllers\PrintCardRevisionController::class, 'destroy'])->name('print-card-revisiones.destroy')->middleware('can:print-card-revisiones-destroy');
    });
});

// DASHBOARDS //
//Route::get('index', [DashboardsController::class, 'index']);
Route::get('index2', [DashboardsController::class, 'index2']);
Route::get('index3', [DashboardsController::class, 'index3']);
Route::get('index4', [DashboardsController::class, 'index4']);
Route::get('index5', [DashboardsController::class, 'index5']);
Route::get('index6', [DashboardsController::class, 'index6']);
Route::get('index7', [DashboardsController::class, 'index7']);
Route::get('index8', [DashboardsController::class, 'index8']);
Route::get('index9', [DashboardsController::class, 'index9']);
Route::get('index10', [DashboardsController::class, 'index10']);
Route::get('index11', [DashboardsController::class, 'index11']);
Route::get('index12', [DashboardsController::class, 'index12']);

// PAGES //
Route::get('aboutus', [PagesController::class, 'aboutus']);
Route::get('blog', [PagesController::class, 'blog']);
Route::get('blog-details', [PagesController::class, 'blog_details']);
Route::get('blog-create', [PagesController::class, 'blog_create']);
Route::get('chat', [PagesController::class, 'chat']);
Route::get('contacts', [PagesController::class, 'contacts']);
Route::get('contactus', [PagesController::class, 'contactus']);
Route::get('add-products', [PagesController::class, 'add_products']);
Route::get('cart', [PagesController::class, 'cart']);
Route::get('checkout', [PagesController::class, 'checkout']);
Route::get('edit-products', [PagesController::class, 'edit_products']);
Route::get('order-details', [PagesController::class, 'order_details']);
Route::get('orders', [PagesController::class, 'orders']);
Route::get('products', [PagesController::class, 'products']);
Route::get('products-details', [PagesController::class, 'products_details']);
Route::get('products-list', [PagesController::class, 'products_list']);
Route::get('wishlist', [PagesController::class, 'wishlist']);
Route::get('mail', [PagesController::class, 'mail']);
Route::get('mail-settings', [PagesController::class, 'mail_settings']);
Route::get('empty-page', [PagesController::class, 'empty_page']);
Route::get('faqs', [PagesController::class, 'faqs']);
Route::get('filemanager', [PagesController::class, 'filemanager']);
Route::get('invoice-create', [PagesController::class, 'invoice_create']);
Route::get('invoice-details', [PagesController::class, 'invoice_details']);
Route::get('invoice-list', [PagesController::class, 'invoice_list']);
Route::get('landing', [PagesController::class, 'landing']);
Route::get('landing-jobs', [PagesController::class, 'landing_jobs']);
Route::get('notifications', [PagesController::class, 'notifications']);
Route::get('pricing', [PagesController::class, 'pricing']);
Route::get('profile', [PagesController::class, 'profile']);
Route::get('reviews', [PagesController::class, 'reviews']);
Route::get('team', [PagesController::class, 'team']);
Route::get('terms', [PagesController::class, 'terms']);
Route::get('timeline', [PagesController::class, 'timeline']);
Route::get('todo', [PagesController::class, 'todo']);

// TASK //
Route::get('task-kanban-board', [TaskController::class, 'task_kanban_board']);
Route::get('task-listview', [TaskController::class, 'task_listview']);
Route::get('task-details', [TaskController::class, 'task_details']);

// AUTHENTICATION //
Route::get('comingsoon', [AuthenticationController::class, 'comingsoon']);
Route::get('createpassword-basic', [AuthenticationController::class, 'createpassword_basic']);
Route::get('createpassword-cover', [AuthenticationController::class, 'createpassword_cover']);
Route::get('lockscreen-basic', [AuthenticationController::class, 'lockscreen_basic']);
Route::get('lockscreen-cover', [AuthenticationController::class, 'lockscreen_cover']);
Route::get('resetpassword-basic', [AuthenticationController::class, 'resetpassword_basic']);
Route::get('resetpassword-cover', [AuthenticationController::class, 'resetpassword_cover']);
Route::get('signup-basic', [AuthenticationController::class, 'signup_basic']);
Route::get('signup-cover', [AuthenticationController::class, 'signup_cover']);
Route::get('signin-basic', [AuthenticationController::class, 'signin_basic']);
Route::get('signin-cover', [AuthenticationController::class, 'signin_cover']);
Route::get('twostep-verification-basic', [AuthenticationController::class, 'twostep_verification_basic']);
Route::get('twostep-verification-cover', [AuthenticationController::class, 'twostep_verification_cover']);
Route::get('under-maintenance', [AuthenticationController::class, 'under_maintenance']);

// ERROR //
Route::get('error401', [ErrorController::class, 'error401']);
Route::get('error404', [ErrorController::class, 'error404']);
Route::get('error500', [ErrorController::class, 'error500']);

// UI ELEMENTS //
Route::get('alerts', [UielementsController::class, 'alerts']);
Route::get('badges', [UielementsController::class, 'badges']);
Route::get('breadcrumbs', [UielementsController::class, 'breadcrumbs']);
Route::get('buttons', [UielementsController::class, 'buttons']);
Route::get('buttongroups', [UielementsController::class, 'buttongroups']);
Route::get('cards', [UielementsController::class, 'cards']);
Route::get('dropdowns', [UielementsController::class, 'dropdowns']);
Route::get('images-figures', [UielementsController::class, 'images_figures']);
Route::get('indicators', [UielementsController::class, 'indicators']);
Route::get('listgroups', [UielementsController::class, 'listgroups']);
Route::get('navs-tabs', [UielementsController::class, 'navs_tabs']);
Route::get('object-fit', [UielementsController::class, 'object_fit']);
Route::get('paginations', [UielementsController::class, 'paginations']);
Route::get('popovers', [UielementsController::class, 'popovers']);
Route::get('progress', [UielementsController::class, 'progress']);
Route::get('spinners', [UielementsController::class, 'spinners']);
Route::get('toasts', [UielementsController::class, 'toasts']);
Route::get('tooltips', [UielementsController::class, 'tooltips']);

// UTILITIES //
Route::get('avatars', [UtilitiesController::class, 'avatars']);
Route::get('borders', [UtilitiesController::class, 'borders']);
Route::get('colors', [UtilitiesController::class, 'colors']);
Route::get('columns', [UtilitiesController::class, 'columns']);
Route::get('flex', [UtilitiesController::class, 'flex']);
Route::get('grids', [UtilitiesController::class, 'grids']);

// FORMS //
Route::get('form-inputs', [FormsController::class, 'form_inputs']);
Route::get('form-check-radios', [FormsController::class, 'form_check_radios']);
Route::get('form-input-groups', [FormsController::class, 'form_input_groups']);
Route::get('form-select', [FormsController::class, 'form_select']);
Route::get('form-range', [FormsController::class, 'form_range']);
Route::get('form-file-uploads', [FormsController::class, 'form_file_uploads']);
Route::get('form-datetime-pickers', [FormsController::class, 'form_datetime_pickers']);
Route::get('form-color-pickers', [FormsController::class, 'form_color_pickers']);
Route::get('form-layouts', [FormsController::class, 'form_layouts']);
Route::get('quill-editor', [FormsController::class, 'quill_editor']);
Route::get('form-validations', [FormsController::class, 'form_validations']);
Route::get('form-select2', [FormsController::class, 'form_select2']);

// ADVANCED UI //
Route::get('accordions-collapse', [AdvanceduiController::class, 'accordions_collapse']);
Route::get('draggable-cards', [AdvanceduiController::class, 'draggable_cards']);
Route::get('modals-closes', [AdvanceduiController::class, 'modals_closes']);
Route::get('navbars', [AdvanceduiController::class, 'navbars']);
Route::get('offcanvas', [AdvanceduiController::class, 'offcanvas']);
Route::get('ratings', [AdvanceduiController::class, 'ratings']);
Route::get('scrollspy', [AdvanceduiController::class, 'scrollspy']);
Route::get('swiperjs', [AdvanceduiController::class, 'swiperjs']);

// WIDGETS //
Route::get('widgets', [WidgetsController::class, 'widgets']);

// APPS //
Route::get('full-calendar', [AppsController::class, 'full_calendar']);
Route::get('gallery', [AppsController::class, 'gallery']);
Route::get('projects-list', [AppsController::class, 'projects_list']);
Route::get('projects-overview', [AppsController::class, 'projects_overview']);
Route::get('projects-create', [AppsController::class, 'projects_create']);
Route::get('job-details', [AppsController::class, 'job_details']);
Route::get('job-company-search', [AppsController::class, 'job_company_search']);
Route::get('job-search', [AppsController::class, 'job_search']);
Route::get('job-post', [AppsController::class, 'job_post']);
Route::get('job-list', [AppsController::class, 'job_list']);
Route::get('job-candidate-search', [AppsController::class, 'job_candidate_search']);
Route::get('job-candidate-details', [AppsController::class, 'job_candidate_details']);
Route::get('nft-marketplace', [AppsController::class, 'nft_marketplace']);
Route::get('nft-details', [AppsController::class, 'nft_details']);
Route::get('nft-create', [AppsController::class, 'nft_create']);
Route::get('nft-wallet-integration', [AppsController::class, 'nft_wallet_integration']);
Route::get('nft-live-auction', [AppsController::class, 'nft_live_auction']);
Route::get('crm-contacts', [AppsController::class, 'crm_contacts']);
Route::get('crm-companies', [AppsController::class, 'crm_companies']);
Route::get('crm-deals', [AppsController::class, 'crm_deals']);
Route::get('crm-leads', [AppsController::class, 'crm_leads']);
Route::get('crypto-transactions', [AppsController::class, 'crypto_transactions']);
Route::get('crypto-currency-exchange', [AppsController::class, 'crypto_currency_exchange']);
Route::get('crypto-buy-sell', [AppsController::class, 'crypto_buy_sell']);
Route::get('crypto-marketcap', [AppsController::class, 'crypto_marketcap']);
Route::get('crypto-wallet', [AppsController::class, 'crypto_wallet']);

// TSBLES //
Route::get('tables', [TablesController::class, 'tables']);
Route::get('grid-tables', [TablesController::class, 'grid_tables']);
Route::get('data-tables', [TablesController::class, 'data_tables']);

// CHARTS //
Route::get('apex-line-charts', [ChartsController::class, 'apex_line_charts']);
Route::get('apex-area-charts', [ChartsController::class, 'apex_area_charts']);
Route::get('apex-column-charts', [ChartsController::class, 'apex_column_charts']);
Route::get('apex-bar-charts', [ChartsController::class, 'apex_bar_charts']);
Route::get('apex-mixed-charts', [ChartsController::class, 'apex_mixed_charts']);
Route::get('apex-rangearea-charts', [ChartsController::class, 'apex_rangearea_charts']);
Route::get('apex-timeline-charts', [ChartsController::class, 'apex_timeline_charts']);
Route::get('apex-candlestick-charts', [ChartsController::class, 'apex_candlestick_charts']);
Route::get('apex-boxplot-charts', [ChartsController::class, 'apex_boxplot_charts']);
Route::get('apex-bubble-charts', [ChartsController::class, 'apex_bubble_charts']);
Route::get('apex-scatter-charts', [ChartsController::class, 'apex_scatter_charts']);
Route::get('apex-heatmap-charts', [ChartsController::class, 'apex_heatmap_charts']);
Route::get('apex-treemap-charts', [ChartsController::class, 'apex_treemap_charts']);
Route::get('apex-pie-charts', [ChartsController::class, 'apex_pie_charts']);
Route::get('apex-radialbar-charts', [ChartsController::class, 'apex_radialbar_charts']);
Route::get('apex-radar-charts', [ChartsController::class, 'apex_radar_charts']);
Route::get('apex-polararea-charts', [ChartsController::class, 'apex_polararea_charts']);
Route::get('chartjs-charts', [ChartsController::class, 'chartjs_charts']);
Route::get('echarts', [ChartsController::class, 'echarts']);
Route::get('chartjs', [ChartsController::class, 'chartjs']);
Route::get('echartjs', [ChartsController::class, 'echartjs']);

// MAPS //
Route::get('google-maps', [MapsController::class, 'google_maps']);
Route::get('leaflet-maps', [MapsController::class, 'leaflet_maps']);
Route::get('vector-maps', [MapsController::class, 'vector_maps']);

// ICONS //
Route::get('icons', [IconsController::class, 'icons']);

