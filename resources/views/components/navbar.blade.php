{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="d-flex mx-auto">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @guest
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Registrati</a>
              </li>
              
              @else
              <ul>
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
                </ul>
                @endguest
            </ul>  
                

            



      </div>
    </div>
  </nav> --}}


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item mx-auto">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
          </li>

          @guest
          <li class="nav-item ms-auto">
            <a class="nav-link" aria-current="page" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>

          @else
          <li class="nav-item dropdown me-auto">
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