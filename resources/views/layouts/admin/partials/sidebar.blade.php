<ul class="navbar-nav bg-transparent p-2 text-black  accordion" id="sidebar" >
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <img src="{{ asset('favcon.svg') }}" alt="Logo" class="logo">        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('admin.dashboard') ? ' fw-bolder active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2 fs-4 "></i>
            <span class=" d-none d-md-inline fs-5 ">Dashboard</span> <!-- Texto a ocultar en pantallas pequeñas -->
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link   {{ Request::routeIs('properties.index') ? ' fw-bolder active' : '' }}" href="{{ route('properties.index') }}">
            <i class="bi bi-house fs-4  "></i>
            <span class=" d-none d-md-inline fs-5 ">Propiedades</span> <!-- Texto a ocultar en pantallas pequeñas -->
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  {{ Request::routeIs('general-information.index') ? ' fw-bolder active' : '' }}" href="{{ route('general-information.index') }}">
            <i class="bi bi-info-circle fs-4 "></i>
            <span class=" d-none d-md-inline fs-5 ">Informacion</span> <!-- Texto a ocultar en pantallas pequeñas -->
        </a>
    </li>
    <li class="nav-item">
        <form method="GET" action="{{ route('logout') }}">
            @csrf
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); this.closest('form').submit();">
               <i class="bi bi-box-arrow-right fs-4 "></i>
                <span class=" d-none d-md-inline fs-5 ">{{ __('Salir') }}</span>
            </a>
        </form>
    </li>

</ul>
<style>

    @media (max-width: 767px) {
      .logo  {
        width: 100%!important; /* Tamaño del logo en pantallas pequeñas (ajústalo según lo necesites) */
        height: auto;
      }
    }
    @media (min-width: 2000px) {
      .logo {
        width: 40%!important; /* Ajusta el tamaño del logo en pantallas grandes */
      }
    }

    </style>
