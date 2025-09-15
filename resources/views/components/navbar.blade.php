<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="{{ route('inicio') }}" class="{{ Request::routeIs('inicio') ? 'active' : '' }}">Inicio</a></li>
        <li><a href="{{ route('acerca') }}" class="{{ Request::routeIs('acerca') ? 'active' : '' }}">Acerca de</a></li>
        <li><a href="{{ route('resumen') }}" class="{{ Request::routeIs('resumen') ? 'active' : '' }}">Resumen</a></li>
        <li><a href="{{ route('servicios') }}" class="{{ Request::routeIs('servicios') ? 'active' : '' }}">Servicios</a></li>
        <li><a href="{{ route('portafolio') }}" class="{{ Request::routeIs('portafolio') ? 'active' : '' }}">Portafolio</a></li>
        <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#">Dropdown 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @auth
                            <li><a href="{{('dashboard') }}">dashboard</a></li>
                        @else
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endauth
                        <li><a href="#">Deep Dropdown 3</a></li>
                        <li><a href="#">Deep Dropdown 4</a></li>
                        <li><a href="#">Deep Dropdown 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Dropdown 2</a></li>
                <li><a href="#">Dropdown 3</a></li>
                <li><a href="#">Dropdown 4</a></li>
            </ul>
        </li>
        <li><a href="{{ route('contacto') }}" class="{{ Request::routeIs('contacto') ? 'active' : '' }}">Contacto</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>