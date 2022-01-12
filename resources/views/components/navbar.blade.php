  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand img-scale" href="{{route('home')}}"><img src="/img/logo_presto.png" class="img-fluid" alt="logo presto.it"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex ms-auto">
            <input class="form-control me-2" type="search" placeholder="Cerca..." aria-label="Search">
            <button class="btn btn-dark" type="submit"><i class="fas fa-search fa-2x"></i></button>
        </form>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          

          @guest
          <li class="nav-item">

            <a class="nav-link" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Fai login</a>
          </li>
          <li class="nav-item ms-auto">
            <a class="nav-link" aria-current="page" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>

          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ciao, {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Profilo</a></li>
                <li><a class="dropdown-item" href="#">I tuoi annunci</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="" onclick = "event.preventDefault(); document.getElementById('form-logout').submit();">Esci</a>
                    
                    <form action="{{route('logout')}}" method="post" id="form-logout">
                        @csrf
                    </form>    
                </li>
            </ul>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>


  {{-- Primo Modal per login con switch register funzionante che figata!!  DA STILARE--}}
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

         {{-- Form login --}}

          <form method="post" action="{{route('login')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">     
              </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="InputPassword1">
              
            </div>
            <button type="submit" class="btn btn-primary">Accedi</button>
          </form>
        </div>
        <div class="modal-footer">

          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Se non sei registrato clicca qui</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Secondo Modal --}}
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Registrati</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          {{-- Form Registrati --}}
          <form method="post" action="{{route('register')}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Nome e cognome</label>
              <input type="text" name="name" class="form-control" id="InputName" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">     
              </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="InputPassword1">
              <div id="exampleInputPassword1" class="form-text">Non condivedere la tua password con nessuno</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPasswordConfirmation" class="form-label">Conferma la password</label>
                <input type="password" name="password_confirmation" class="form-control" id="InputPasswordConfirmation">
              </div>
            <button type="submit" class="btn btn-primary">Registrati</button>
          </form>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Torna al login</button>
        </div>
      </div>
    </div>
  </div>

  