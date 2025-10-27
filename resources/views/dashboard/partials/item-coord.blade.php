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
                <p class="font-li">Grupos Coordenados</p>
            </a>
        </li>
    </ul>
</li>

<!-- ================== SOLICITAÇÕES ================== -->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="bi bi-clipboard-check-fill"></i>
        <p>
            Solicitações
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('index.users') }}" class="nav-link">
                <i class="bi bi-circle-fill"></i>
                <p>Solicitações Abertas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="./widgets/info-box.html" class="nav-link">
                <i class="bi bi-circle-fill"></i>
                <p class="text-break">Acompanhar<br> Solicitações</p>
            </a>
        </li>
    </ul>
</li>
