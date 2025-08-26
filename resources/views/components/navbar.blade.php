<div>
    <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('inicio') }}" class="active">Inicio</a></li>
          <li><a href="{{ route('acerca') }}">Acerca de</a></li>
          <li><a href="{{ route('resumen') }}">Resumen</a></li>
          <li><a href="{{ route('servicios') }}">Servicios</a></li>
          <li><a href="{{ route('portafolio') }}">Portafolio</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
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
          <li><a href="{{ route('contacto') }}">Contacto</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
</div>