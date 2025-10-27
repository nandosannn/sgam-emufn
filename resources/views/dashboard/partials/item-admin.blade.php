<!-- ================== USUÁRIOS ================== -->
<li class="nav-item {{ Request::is('users*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link d-flex align-items-center">
        <i class="bi bi-person-fill"></i>
        <p>
            Usuários
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('create.users') }}"
                class="nav-link {{ Request::routeIs('create.users') ? 'active' : '' }}">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Criar Usuário</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('index.users') }}"
                class="nav-link {{ Request::routeIs('index.users') ? 'active' : '' }}">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Lista de Usuários</p>
            </a>
        </li>
    </ul>
</li>

<!-- ================== GRUPOS MUSICAIS ================== -->
<li class="nav-item {{ Request::is('grupos*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link d-flex align-items-center">
        <i class="bi bi-music-note-beamed"></i>
        <p>
            Grupos Musicais
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('create.grupos') }}"
                class="nav-link {{ Request::routeIs('create.grupos') ? 'active' : '' }}">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Criar Grupo</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('index.grupos') }}"
                class="nav-link {{ Request::routeIs('index.grupos') ? 'active' : '' }}">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Lista de Grupos</p>
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
                <p class="font-li">Solicitações Gerais</p>
            </a>
        </li>
    </ul>
</li>

<!-- ================== RELATÓRIOS ================== -->
<li class="nav-item {{ Request::is('relatorios*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link d-flex align-items-center">
        <i class="bi bi-clipboard-fill"></i>
        <p>
            Relatórios
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Solicitações por Status</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Solicitações por Grupo</p>
            </a>
        </li>
    </ul>
</li>
