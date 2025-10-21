<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow sidebar-liberation sidebar-menu" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('home') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ Vite::asset('resources/images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">SGAM</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                @role('admin')
                <li class="nav-header">ADMINISTRAÇÃO</li>
                <li class="nav-item {{ Request::is('users*') ? 'menu-open' : ''  }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-person-gear"></i>
                        <p>
                            Usuários
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('create.users') }}" class="nav-link {{ Request::routeIs('create.users') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Criar Usuário</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('index.users') }}" class="nav-link {{ Request::routeIs('index.users') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Lista de Usuários</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('grupos*') ? 'menu-open' : ''  }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-person-gear"></i>
                        <p>
                            Grupos Musicais
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                         <li class="nav-item">
                            <a href="{{ route('create.grupos') }}" class="nav-link {{ Request::routeIs('create.grupos') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Criar Grupo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('index.grupos') }}" class="nav-link {{ Request::routeIs('index.grupos') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Lista de Grupos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole
                <li class="nav-header">CONFIGURAÇÕES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-person-gear"></i>
                        <p>
                            Coordenador
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('index.users') }}" class="nav-link">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Lista de Coordenadores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./widgets/info-box.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Lista de Grupos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('grupos*') ? 'menu-open' : ''  }}">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Solicitações
                            <span class="nav-badge badge text-bg-secondary me-3">6</span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('index.eventos') }}" class="nav-link {{ Request::routeIs('index.eventos') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Lista de Eventos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Relatórios
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./UI/general.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Solicitações Abertas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./UI/icons.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Solicitações Sem Grupos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./UI/icons.html" class="nav-link" title="Solicitações Sem Transporte">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Solicitações Sem Transporte</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
