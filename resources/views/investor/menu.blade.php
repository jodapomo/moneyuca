<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Administrar
</div>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.resume') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('investor.resume') }}">
        <i class="fas fa-fw fa-sign-in-alt"></i>
        <span>Resumen</span>
    </a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.activeOrders') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('investor.activeOrders') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Ordenes Activas</span>
    </a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.createOrder') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('investor.createOrder') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Crear Orden</span>
    </a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.createModifier') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('investor.createModifier') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Crear Modificador</span>
    </a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.notInterpretedMessage') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('investor.notInterpretedMessage') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Mensajes No Interpretados</span>
    </a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.configurations') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('investor.configurations') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Configuracion</span>
    </a>
</li>
