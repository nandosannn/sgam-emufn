<!--begin::Sidebar-->
<aside class="font-sidebar font app-sidebar bg-body-secondary shadow sidebar-menu" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}" class="brand-link">
            <span class="font-logo brand-text fw-light">SGAM</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                @role('admin')
                <li class="nav-header">ADMINISTRAÇÃO</li>
                @include('dashboard.partials.item-admin')
                @endrole
                <li class="nav-header">COORDENAÇÃO</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-person-gear"></i>
                        <p>
                            Solicitações
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('index.users') }}" class="nav-link">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Solicitações Abertas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./widgets/info-box.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p class="text-break">Acompanhar<br> Solicitações</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">SOLICITAÇÕES</li>
                <li class="nav-item {{ Request::is('eventos*') ? 'menu-open' : ''  }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Eventos
                            <!--
                            <span class="nav-badge badge text-bg-secondary me-3">6</span>-->
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('create.eventos') }}" class="nav-link {{ Request::routeIs('create.eventos') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Criar Evento</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('index.eventos') }}" class="nav-link {{ Request::routeIs('index.eventos') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Lista de Eventos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('solicitacoes*') ? 'menu-open' : ''  }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Solicitações
                            <!--
                            <span class="nav-badge badge text-bg-secondary me-3">6</span>-->
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('index.solicitacoes') }}" class="nav-link {{ Request::routeIs('index.solicitacoes') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-fill"></i>
                                <p>Lista de Solicitações</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
@vite('resources/css/app.css')
</aside>
<!--end::Sidebar-->
