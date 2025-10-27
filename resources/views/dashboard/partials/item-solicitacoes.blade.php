<!-- ================== EVENTOS ================== -->
<li class="nav-item {{ Request::is('eventos*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link d-flex align-items-center">
        <i class="bi bi-calendar-fill"></i>
        <p>
            Eventos
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('create.eventos') }}"
                class="nav-link {{ Request::routeIs('create.eventos') ? 'active' : '' }}">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Criar Evento</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('index.eventos') }}"
                class="nav-link {{ Request::routeIs('index.eventos') ? 'active' : '' }}">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Lista de Eventos</p>
            </a>
        </li>
    </ul>
</li>

<!-- ================== SOLICITAÇÕES ================== -->
<li class="nav-item {{ Request::is('solicitacoes*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link d-flex align-items-center">
        <i class="nav-icon bi bi-clipboard-fill"></i>
        <p>
            Solicitações
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('index.solicitacoes') }}"
                class="nav-link {{ Request::routeIs('index.solicitacoes') ? 'active' : '' }}">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Solicitações Abertas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('index.solicitacoes') }}"
                class="nav-link {{ Request::routeIs('index.solicitacoes') ? 'active' : '' }}">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Acompanhar <br> Solicitações</p>
            </a>
        </li>
    </ul>
</li>
