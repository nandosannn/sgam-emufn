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
                @include('dashboard.partials.item-coord')
                <li class="nav-header">SOLICITAÇÕES</li>
                @include('dashboard.partials.item-solicitacoes')
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
@vite('resources/css/app.css')
</aside>
<!--end::Sidebar-->
