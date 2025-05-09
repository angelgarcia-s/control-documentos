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
use App\Http\Controllers\TiposEmpaqueController;
use App\Http\Controllers\EmpaquesController;
use App\Http\Controllers\TiposSelloController;
use App\Http\Controllers\AcabadosController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\BarnicesController;
use App\Http\Controllers\CodigosBarrasController;
use App\Http\Controllers\ProductoCodigosBarrasController;
use App\Http\Controllers\PrintCardController;
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
require __DIR__.'/auth.php';

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardsController::class, 'index'])->name('dashboard');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para Gestión de Usuarios
    Route::prefix('usuarios')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('usuarios.index')->middleware('permission:usuarios-list');
        Route::get('/crear', [UsersController::class, 'create'])->name('usuarios.create')->middleware('permission:usuarios-create');
        Route::post('/', [UsersController::class, 'store'])->name('usuarios.store')->middleware('permission:usuarios-create');
        Route::get('/{user}', [UsersController::class, 'show'])->name('usuarios.show')->middleware('permission:usuarios-show');
        Route::get('/{user}/editar', [UsersController::class, 'edit'])->name('usuarios.edit')->middleware('permission:usuarios-edit');
        Route::put('/{user}', [UsersController::class, 'update'])->name('usuarios.update')->middleware('permission:usuarios-edit');
        Route::delete('/{user}', [UsersController::class, 'destroy'])->name('usuarios.destroy')->middleware('permission:usuarios-destroy');
    });

    // Rutas para Gestión de Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [RolesController::class, 'index'])->name('roles.index')->middleware('permission:roles-list');
        Route::get('/crear', [RolesController::class, 'create'])->name('roles.create')->middleware('permission:roles-create');
        Route::post('/', [RolesController::class, 'store'])->name('roles.store')->middleware('permission:roles-create');
        Route::get('/{role}', [RolesController::class, 'show'])->name('roles.show')->middleware('permission:roles-show');
        Route::get('/{role}/editar', [RolesController::class, 'edit'])->name('roles.edit')->middleware('permission:roles-edit');
        Route::put('/{role}', [RolesController::class, 'update'])->name('roles.update')->middleware('permission:roles-edit');
        Route::delete('/{role}', [RolesController::class, 'destroy'])->name('roles.destroy')->middleware('permission:roles-destroy');
    });

    // Rutas para Gestión de Permisos
    Route::prefix('permisos')->group(function () {
        Route::get('/', [PermissionsController::class, 'index'])->name('permisos.index')->middleware('permission:permisos-list');
        Route::get('/crear', [PermissionsController::class, 'create'])->name('permisos.create')->middleware('permission:permisos-create');
        Route::post('/', [PermissionsController::class, 'store'])->name('permisos.store')->middleware('permission:permisos-create');
        Route::get('/{permission}/editar', [PermissionsController::class, 'edit'])->name('permisos.edit')->middleware('permission:permisos-edit');
        Route::put('/{permission}', [PermissionsController::class, 'update'])->name('permisos.update')->middleware('permission:permisos-edit');
    });

    // Rutas para Gestión de Nombres de Visualización de Categorías
    Route::prefix('permisos/categorias')->group(function () {
        Route::get('/edit', [CategoriasPermisosController::class, 'edit'])
            ->name('categorias-permisos.edit')
            ->middleware('permission:permisos-edit');
        Route::post('/', [CategoriasPermisosController::class, 'update'])
            ->name('categorias-permisos.update')
            ->middleware(['permission:permisos-edit', \App\Http\Middleware\DebugRequest::class]);
    });

    // Rutas para Productos
    Route::resource('productos', ProductosController::class, [
        'parameters' => ['productos' => 'producto'],
        'middleware' => [
            'index' => 'permission:productos-list',
            'create' => 'permission:productos-create',
            'store' => 'permission:productos-create',
            'show' => 'permission:productos-show',
            'edit' => 'permission:productos-edit',
            'update' => 'permission:productos-edit',
            'destroy' => 'permission:productos-destroy',
        ],
    ]);

    // Rutas para Códigos de Barras
    Route::resource('codigos-barras', CodigosBarrasController::class, [
        'parameters' => ['codigos-barras' => 'codigoBarra'],
        'middleware' => [
            'index' => 'permission:codigos-barras-list',
            'create' => 'permission:codigos-barras-create',
            'store' => 'permission:codigos-barras-create',
            'show' => 'permission:codigos-barras-show',
            'edit' => 'permission:codigos-barras-edit',
            'update' => 'permission:codigos-barras-edit',
            'destroy' => 'permission:codigos-barras-destroy',
        ],
    ]);
    Route::get('/codigos-barras/asignar/{sku}', [ProductoCodigosBarrasController::class, 'create'])->name('codigos-barras.asignar')->middleware('permission:asignar-codigos-barras');
    Route::post('/codigos-barras/asignar/{sku}', [ProductoCodigosBarrasController::class, 'store'])->name('codigos-barras.asignar.store')->middleware('permission:asignar-codigos-barras');

    // Rutas para Producto-Codigos-Barras
    Route::resource('producto-codigos-barras', ProductoCodigosBarrasController::class, [
        'parameters' => ['producto-codigos-barras' => 'productoCodigosBarra'],
        'middleware' => [
            'index' => 'permission:producto-codigos-barras-list',
            'create' => 'permission:producto-codigos-barras-create',
            'store' => 'permission:producto-codigos-barras-create',
            'show' => 'permission:producto-codigos-barras-show',
            'edit' => 'permission:producto-codigos-barras-edit',
            'update' => 'permission:producto-codigos-barras-edit',
            'destroy' => 'permission:producto-codigos-barras-destroy',
        ],
    ]);

    // Rutas para Familias
    Route::resource('familias', FamiliasController::class, [
        'parameters' => ['familias' => 'familia'],
        'middleware' => [
            'index' => 'permission:familias-list',
            'create' => 'permission:familias-create',
            'store' => 'permission:familias-create',
            'show' => 'permission:familias-show',
            'edit' => 'permission:familias-edit',
            'update' => 'permission:familias-edit',
            'destroy' => 'permission:familias-destroy',
        ],
    ]);

    // Rutas para Categorías
    Route::resource('categorias', CategoriasController::class, [
        'parameters' => ['categorias' => 'categoria'],
        'middleware' => [
            'index' => 'permission:categorias-list',
            'create' => 'permission:categorias-create',
            'store' => 'permission:categorias-create',
            'show' => 'permission:categorias-show',
            'edit' => 'permission:categorias-edit',
            'update' => 'permission:categorias-edit',
            'destroy' => 'permission:categorias-destroy',
        ],
    ]);

    // Rutas para Colores
    Route::resource('colores', ColoresController::class, [
        'parameters' => ['colores' => 'color'],
        'middleware' => [
            'index' => 'permission:colores-list',
            'create' => 'permission:colores-create',
            'store' => 'permission:colores-create',
            'show' => 'permission:colores-show',
            'edit' => 'permission:colores-edit',
            'update' => 'permission:colores-edit',
            'destroy' => 'permission:colores-destroy',
        ],
    ]);

    // Rutas para Tamaños
    Route::resource('tamanos', TamanosController::class, [
        'parameters' => ['tamanos' => 'tamano'],
        'middleware' => [
            'index' => 'permission:tamanos-list',
            'create' => 'permission:tamanos-create',
            'store' => 'permission:tamanos-create',
            'show' => 'permission:tamanos-show',
            'edit' => 'permission:tamanos-edit',
            'update' => 'permission:tamanos-edit',
            'destroy' => 'permission:tamanos-destroy',
        ],
    ]);

    // Rutas para Unidades (Unidades de Medida)
    Route::resource('unidades', UnidadMedidaController::class, [
        'parameters' => ['unidades' => 'unidad'],
        'middleware' => [
            'index' => 'permission:unidades-list',
            'create' => 'permission:unidades-create',
            'store' => 'permission:unidades-create',
            'show' => 'permission:unidades-show',
            'edit' => 'permission:unidades-edit',
            'update' => 'permission:unidades-edit',
            'destroy' => 'permission:unidades-destroy',
        ],
    ]);

    // Rutas para Tipos de Empaque
    Route::resource('tipos-empaque', TiposEmpaqueController::class, [
        'parameters' => ['tipos-empaque' => 'tipo_empaque'],
        'middleware' => [
            'index' => 'permission:tipos-empaque-list',
            'create' => 'permission:tipos-empaque-create',
            'store' => 'permission:tipos-empaque-create',
            'show' => 'permission:tipos-empaque-show',
            'edit' => 'permission:tipos-empaque-edit',
            'update' => 'permission:tipos-empaque-edit',
            'destroy' => 'permission:tipos-empaque-destroy',
        ],
    ]);

    // Rutas para Empaques
    Route::resource('empaques', EmpaquesController::class, [
        'parameters' => ['empaques' => 'empaque'],
        'middleware' => [
            'index' => 'permission:empaques-list',
            'create' => 'permission:empaques-create',
            'store' => 'permission:empaques-create',
            'show' => 'permission:empaques-show',
            'edit' => 'permission:empaques-edit',
            'update' => 'permission:empaques-edit',
            'destroy' => 'permission:empaques-destroy',
        ],
    ]);

    // Rutas para Tipos de Sello
    Route::resource('tipos-sello', TiposSelloController::class, [
        'parameters' => ['tipos-sello' => 'tipo_sello'],
        'middleware' => [
            'index' => 'permission:tipos-sello-list',
            'create' => 'permission:tipos-sello-create',
            'store' => 'permission:tipos-sello-create',
            'show' => 'permission:tipos-sello-show',
            'edit' => 'permission:tipos-sello-edit',
            'update' => 'permission:tipos-sello-edit',
            'destroy' => 'permission:tipos-sello-destroy',
        ],
    ]);

    // Rutas para Acabados
    Route::resource('acabados', AcabadosController::class, [
        'parameters' => ['acabados' => 'acabado'],
        'middleware' => [
            'index' => 'permission:acabados-list',
            'create' => 'permission:acabados-create',
            'store' => 'permission:acabados-create',
            'show' => 'permission:acabados-show',
            'edit' => 'permission:acabados-edit',
            'update' => 'permission:acabados-edit',
            'destroy' => 'permission:acabados-destroy',
        ],
    ]);

    // Rutas para Materiales
    Route::resource('materiales', MaterialesController::class, [
        'parameters' => ['materiales' => 'material'],
        'middleware' => [
            'index' => 'permission:materiales-list',
            'create' => 'permission:materiales-create',
            'store' => 'permission:materiales-create',
            'show' => 'permission:materiales-show',
            'edit' => 'permission:materiales-edit',
            'update' => 'permission:materiales-edit',
            'destroy' => 'permission:materiales-destroy',
        ],
    ]);

    // Rutas para Barnices
    Route::resource('barnices', BarnicesController::class, [
        'parameters' => ['barnices' => 'barniz'],
        'middleware' => [
            'index' => 'permission:barnices-list',
            'create' => 'permission:barnices-create',
            'store' => 'permission:barnices-create',
            'show' => 'permission:barnices-show',
            'edit' => 'permission:barnices-edit',
            'update' => 'permission:barnices-edit',
            'destroy' => 'permission:barnices-destroy',
        ],
    ]);

    // Rutas para Proveedores
    Route::resource('proveedores', ProveedoresController::class, [
        'parameters' => ['proveedores' => 'proveedor'],
        'middleware' => [
            'index' => 'permission:proveedores-list',
            'create' => 'permission:proveedores-create',
            'store' => 'permission:proveedores-create',
            'show' => 'permission:proveedores-show',
            'edit' => 'permission:proveedores-edit',
            'update' => 'permission:proveedores-edit',
            'destroy' => 'permission:proveedores-destroy',
        ],
    ]);

    // Rutas para PrintCards (descomentadas y actualizadas)
    // Route::resource('printcards', PrintCardController::class, [
    //     'parameters' => ['printcards' => 'printCard'],
    //     'middleware' => [
    //         'index' => 'permission:printcards-list',
    //         'create' => 'permission:printcards-create',
    //         'store' => 'permission:printcards-create',
    //         'show' => 'permission:printcards-show',
    //         'edit' => 'permission:printcards-edit',
    //         'update' => 'permission:printcards-edit',
    //         'destroy' => 'permission:printcards-destroy',
    //     ],
    // ]);
});

// DASHBOARDS //
Route::get('index', [DashboardsController::class, 'index']);
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

