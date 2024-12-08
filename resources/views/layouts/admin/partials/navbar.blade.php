
<nav class="navbar navbar-expand-lg" style="background-color:var(--primary-color);">
    <div class="container-fluid">

      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <form method="GET" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link fw-bold" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('LogOut') }}
                    </a>
                </form>
            </li>
        </ul>
      </div>
    </div>
  </nav>
