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
            <a href="{{ route('coordenados.grupos') }}"
                class="nav-link {{ Request::routeIs('coordenados.grupos') ? 'active' : '' }}">
                <i class="bi bi-circle-fill"></i>
                <p class="font-li">Grupos Coordenados</p>
            </a>
        </li>
    </ul>
</li>

<!-- ================== SOLICITAÇÕES ================== -->
<li class="nav-item {{ Request::is('solicitacoes*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link d-flex align-items-center">
        <i class="nav-icon bi bi-clipboard-fill"></i>
        <p>
            Solicitações Grupo
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
