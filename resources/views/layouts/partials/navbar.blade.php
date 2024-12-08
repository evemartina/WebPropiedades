<nav class="navbar navbar-expand-lg navbar-light bg-light m-0 p-0">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <!-- Contenedor flex para alinear el logo en el centro -->
      <a class="navbar-brand col-5" href="{{ route('home') }}">
        <!-- Logo visible en todas las pantallas -->
        <img src="{{ asset('favcon.svg') }}" alt="Logo" class="rounded-circle logo m-0 p-0" style="width: 35%; height: auto;">
      </a>

      <!-- Botón de menú hamburguesa en el lado derecho -->
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fs-2"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-black fs-5 {{ Request::routeIs('home') ? ' fw-bolder active' : '' }}" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black fs-5 {{ Request::routeIs('about') ? ' fw-bolder active' : '' }}" href="{{ route('about') }}">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black fs-5 {{ Request::routeIs('contact') ? ' fw-bolder active' : '' }}" href="{{ route('contact') }}">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<style>

@media (max-width: 767px) {
  .navbar-brand img {
    width: 50%!important; /* Tamaño del logo en pantallas pequeñas (ajústalo según lo necesites) */
    height: auto;
  }
}
@media (min-width: 2000px) {
  .navbar-brand img {
    width: 22%!important; /* Ajusta el tamaño del logo en pantallas grandes */
  }
}

</style>
