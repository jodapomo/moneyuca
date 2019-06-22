<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Administrar
</div>

<li class="nav-item {{ ViewHelper::isRouteActive('admin.newInvestors') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('admin.newInvestors') }}">
        <i class="fas fa-fw fa-sign-in-alt"></i>
        <span>Nuevos Inversionistas</span>
    </a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('admin.investors') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('admin.investors') }}">
        <i class="fas fa-fw fa-dollar-sign"></i>
        <span>Inversionistas</span>
    </a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('admin.configurations') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('admin.configurations') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Configuraciones</span>
    </a>
</li>