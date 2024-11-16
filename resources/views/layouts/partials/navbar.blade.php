<nav class="navbar navbar-expand-lg navbar-light bg-light bg-transp">
    <div class="container-fluid">
      <a class="navbar-brand m-0 p-2" href="{{ route('home') }}">
        <img src="{{ asset('storage/images/logo.jpg') }}" alt="Logo" class="img-fluid m-o p-0" width="40%">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fw-bold" href="{{ route('about') }}">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="{{ route('contact') }}">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
