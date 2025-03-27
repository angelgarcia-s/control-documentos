
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
                        <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                            </svg></div>
                        <ul class="main-menu">
                            <!-- Start::slide__category -->
                            <li class="slide__category"><span class="category-name">Control Documental</span></li>
                            <!-- End::slide__category -->

                            <!-- Productos -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-box side-menu__icon"></i>
                                    <span class="side-menu__label">Productos</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide"><a href="{{ route('productos.index') }}" class="side-menu__item">Lista de Productos</a></li>
                                    <li class="slide"><a href="{{ route('productos.create') }}" class="side-menu__item">Agregar Producto</a></li>
                                    <li class="slide"><a href="{{ url('productos/codigos') }}" class="side-menu__item">Códigos de Barras</a></li>
                                    <li class="slide"><a href="{{ url('productos/printcards') }}" class="side-menu__item">Print Cards</a></li>
                                </ul>
                            </li>

                            <!-- Empaques -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-package side-menu__icon"></i>
                                    <span class="side-menu__label">Empaques</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide"><a href="{{ url('empaques/asignar-codigos') }}" class="side-menu__item">Asignar Códigos</a></li>
                                    <li class="slide"><a href="{{ url('empaques/asignar-printcards') }}" class="side-menu__item">Asignar Print Cards</a></li>
                                </ul>
                            </li>

                            <!-- Catálogos -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-collection side-menu__icon"></i>
                                    <span class="side-menu__label">Catálogos</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide"><a href="{{ route('familias.index') }}" class="side-menu__item">Familias</a></li>
                                    <li class="slide"><a href="{{ route('categorias.index') }}" class="side-menu__item">Categorías</a></li>
                                    <li class="slide"><a href="{{ route('colores.index') }}" class="side-menu__item">Colores</a></li>
                                    <li class="slide"><a href="{{ url('tamanos') }}" class="side-menu__item">Tamaños</a></li>
                                    <li class="slide"><a href="{{ url('unidades') }}" class="side-menu__item">Unidades de Medida</a></li>
                                    <li class="slide"><a href="{{ url('tipos-empaque') }}" class="side-menu__item">Tipos de Empaque</a></li>
                                    <li class="slide"><a href="{{ url('tipos-sello') }}" class="side-menu__item">Tipos de Sello</a></li>
                                    <li class="slide"><a href="{{ url('acabados') }}" class="side-menu__item">Acabados</a></li>
                                    <li class="slide"><a href="{{ url('materiales') }}" class="side-menu__item">Materiales</a></li>
                                    <li class="slide"><a href="{{ url('barnices') }}" class="side-menu__item">Barnices</a></li>
                                </ul>
                            </li>

                            <!-- Proveedores -->
                            <li class="slide">
                                <a href="{{ url('proveedores') }}" class="side-menu__item">
                                    <i class="bx bx-user-circle side-menu__icon"></i>
                                    <span class="side-menu__label">Proveedores</span>
                                </a>
                            </li>

                            <!-- Revisiones -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-history side-menu__icon"></i>
                                    <span class="side-menu__label">Revisiones</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide"><a href="{{ url('revisiones/historial') }}" class="side-menu__item">Historial</a></li>
                                    <li class="slide"><a href="{{ url('revisiones/printcards') }}" class="side-menu__item">Versiones de Print Cards</a></li>
                                </ul>
                            </li>

                            <!-- Reportes -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-file side-menu__icon"></i>
                                    <span class="side-menu__label">Reportes</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide"><a href="{{ url('reportes/printcards') }}" class="side-menu__item">Print Cards (PDF)</a></li>
                                    <li class="slide"><a href="{{ url('reportes/codigos-barras') }}" class="side-menu__item">Códigos de Barras</a></li>
                                    <li class="slide"><a href="{{ url('reportes/productos') }}" class="side-menu__item">Exportar Productos</a></li>
                                </ul>
                            </li>

                            <!-- Administración -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-cog side-menu__icon"></i>
                                    <span class="side-menu__label">Administración</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide"><a href="{{ url('usuarios') }}" class="side-menu__item">Usuarios</a></li>
                                    <li class="slide"><a href="{{ url('roles') }}" class="side-menu__item">Roles</a></li>
                                    <li class="slide"><a href="{{ url('configuracion') }}" class="side-menu__item">Configuración</a></li>
                                </ul>
                            </li>
                            <!-- End::slide -->
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                            </svg>
                        </div>
                    </nav>
                    <!-- End::nav -->

                </div>
                <!-- End::main-sidebar -->

            </aside>