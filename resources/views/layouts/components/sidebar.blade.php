<aside class="app-sidebar" id="sidebar">
    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{route('dashboard')}}" class="header-logo">
            <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
            <img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="logo" class="toggle-logo">
            <img src="{{asset('build/assets/images/brand-logos/desktop-dark.png')}}" alt="logo" class="desktop-dark">
            <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="toggle-dark">
            <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
            <img src="{{asset('build/assets/images/brand-logos/toggle-white.png')}}" alt="logo" class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">
        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Control Documental</span></li>
                <!-- End::slide__category -->

                <!-- Productos -->
                @can('productos-list')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bx bx-box side-menu__icon"></i>
                            <span class="side-menu__label">Productos</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            @can('productos-list')
                                <li class="slide"><a href="{{ route('productos.index') }}" class="side-menu__item">Lista de Productos</a></li>
                            @endcan
                            @can('productos-create')
                                <li class="slide"><a href="{{ route('productos.create') }}" class="side-menu__item">Agregar Producto</a></li>
                            @endcan
                            @can('producto-codigos-barras-list')
                                <li class="slide"><a href="{{ route('producto-codigos-barras.index') }}" class="side-menu__item">Productos con Códigos de Barras</a></li>
                            @endcan
                            @can('printcards-list') <!-- Ajustado para el nuevo formato, aunque está comentado en las rutas -->
                                <li class="slide"><a href="{{ url('productos/printcards') }}" class="side-menu__item">Print Cards</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                <!-- Códigos de Barras -->
                @can('codigos-barras-list')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bx bx-package side-menu__icon"></i>
                            <span class="side-menu__label">Códigos de Barras</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            @can('codigos-barras-list')
                                <li class="slide"><a href="{{ route('codigos-barras.index') }}" class="side-menu__item">Códigos de Barras</a></li>
                            @endcan
                            @can('codigos-barras-create')
                                <li class="slide"><a href="{{ route('codigos-barras.create') }}" class="side-menu__item">Agregar Códigos</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                <!-- PrintCards -->
                @can('print-cards-list')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bx bx-printer side-menu__icon"></i>
                            <span class="side-menu__label">PrintCard</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            @can('print-cards-list')
                                <li class="slide"><a href="{{ route('print-cards.index') }}" class="side-menu__item">Lista de PrintCard</a></li>
                            @endcan
                            @can('print-cards-create')
                                <li class="slide"><a href="{{ route('print-cards.create') }}" class="side-menu__item">Agregar PrintCard</a></li>
                            @endcan
                            @can('print-card-revisiones-list')
                                <li class="slide"><a href="{{ route('print-card-revisiones.index') }}" class="side-menu__item">Revisiones de PrintCard</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                <!-- Catálogos -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-collection side-menu__icon"></i>
                        <span class="side-menu__label">Catálogos</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        @can('familias-list')
                            <li class="slide"><a href="{{ route('familias.index') }}" class="side-menu__item">Familias</a></li>
                        @endcan
                        @can('categorias-list')
                            <li class="slide"><a href="{{ route('categorias.index') }}" class="side-menu__item">Categorías</a></li>
                        @endcan
                        @can('colores-list')
                            <li class="slide"><a href="{{ route('colores.index') }}" class="side-menu__item">Colores</a></li>
                        @endcan
                        @can('tamanos-list')
                            <li class="slide"><a href="{{ route('tamanos.index') }}" class="side-menu__item">Tamaños</a></li>
                        @endcan
                        @can('unidades-list')
                            <li class="slide"><a href="{{ route('unidades.index') }}" class="side-menu__item">Unidades de Medida</a></li>
                        @endcan
                        @can('empaques-list')
                            <li class="slide"><a href="{{ route('empaques.index') }}" class="side-menu__item">Empaques</a></li>
                        @endcan
                        @can('clasificaciones-envases-list')
                            <li class="slide"><a href="{{ route('clasificaciones-envases.index') }}" class="side-menu__item">Clasificacion de envases</a></li>
                        @endcan
                        @can('tipos-sello-list')
                            <li class="slide"><a href="{{ route('tipos-sello.index') }}" class="side-menu__item">Tipos de Sello</a></li>
                        @endcan
                        @can('acabados-list')
                            <li class="slide"><a href="{{ route('acabados.index') }}" class="side-menu__item">Acabados</a></li>
                        @endcan
                        @can('materiales-list')
                            <li class="slide"><a href="{{ route('materiales.index') }}" class="side-menu__item">Materiales</a></li>
                        @endcan
                        @can('barnices-list')
                            <li class="slide"><a href="{{ route('barnices.index') }}" class="side-menu__item">Barnices</a></li>
                        @endcan
                    </ul>
                </li>

                <!-- Proveedores -->
                @can('proveedores-list')
                    <li class="slide">
                        <a href="{{ route('proveedores.index') }}" class="side-menu__item">
                            <i class="bx bx-user-circle side-menu__icon"></i>
                            <span class="side-menu__label">Proveedores</span>
                        </a>
                    </li>
                @endcan

                <!-- Administración -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-cog side-menu__icon"></i>
                        <span class="side-menu__label">Administración</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        @can('usuarios-list')
                            <li class="slide"><a href="{{ route('usuarios.index') }}" class="side-menu__item">Usuarios</a></li>
                        @endcan
                        @can('roles-list')
                            <li class="slide"><a href="{{ route('roles.index') }}" class="side-menu__item">Roles</a></li>
                        @endcan
                        @can('permisos-list')
                            <li class="slide"><a href="{{ route('permisos.index') }}" class="side-menu__item">Permisos</a></li>
                        @endcan
                    </ul>
                </li>
                <!-- End::slide -->
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
        <!-- End::nav -->
    </div>
    <!-- End::main-sidebar -->
</aside>
