
<div class="sidebar-heading">
        Administrar
</div>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.manageAccount') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('investor.manageAccount') }}">
        <i class="fas fa-user fa-fw"></i>
		<span>Mi Cuenta</span>
	</a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.openOperations') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('investor.openOperations') }}">
        <i class="fas fa-fire fa-fw"></i>
		<span>Operaciones Abiertas</span>
	</a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.createOperation') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('investor.createOperation') }}">
        <i class="fas fa-plus fa-fw"></i>
		<span>Crear Operación</span>
	</a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.createModifier') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('investor.createModifier') }}">
        <i class="fas fa-tools fa-fw"></i>
		<span>Crear Modificador</span>
	</a>
</li>

<li class="nav-item {{ ViewHelper::isRouteActive('investor.uninterpretedSignals') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('investor.uninterpretedSignals') }}">
                <i class="far fa-question-circle fa-fw"></i>
                <span>Señales No Interpretadas</span>
        </a>
</li>
    