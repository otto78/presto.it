  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand img-scale" href="{{route('home')}}"><img src="/img/presto_scritta.png" class="img-fluid" alt="logo presto.it"></a>
      <a class="presto-link" href="{{route('article.index')}}">{{__('ui.Annunci')}}</a>

      {{-- link lingue

      <div class="dropdown">
        <a class="presto-link mx-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          Lingue
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
         <li class="dropdown-item">
          <form action="{{route('locale','it')}}" method="POST">
          @csrf
            <button type="submit" class="nav-link" style="background-color:transparent; border:none;">
              <span class="flag-icon flag-icon-it"></span>
            </button>
          </form>
        </li>
        <li class="dropdown-item">
          <form action="{{route('locale','gb')}}" method="POST">
          @csrf
            <button type="submit" class="nav-link" style="background-color:transparent; border:none;">
              <span class="flag-icon flag-icon-gb"></span>
            </button>
          </form>
        </li>
        <li class="dropdown-item">
          <form action="{{route('locale','es')}}" method="POST">
          @csrf
            <button type="submit" class="nav-link" style="background-color:transparent; border:none;">
              <span class="flag-icon flag-icon-es"></span>
            </button>
          </form>
        </li>


        </ul>
      </div>--}}

      
      
      {{-- <a class="presto-link" href=""><span class="flag-icon flag-icon-it mx-2"></span></a>
      <a class="presto-link" href=""><span class="flag-icon flag-icon-gb mx-2"></span></a>
      <a class="presto-link" href=""><span class="flag-icon flag-icon-es mx-2"></span></a> --}}

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex ms-auto" action="{{route('search')}}" method="get">
            

            <div class="input-group ombra-search">
              <input class="presto-search form-control" type="search" name='q' placeholder="{{__('ui.Cerca')}}" aria-label="Search" aria-describedby="button-search">
              <button class="btn-presto-search" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>


        {{-- link lingue --}}

      <div class="dropdown ms-auto">
        <a class="presto-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          {{__('ui.Scegli la lingua')}}
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
         <li class="dropdown-item ">
          <form action="{{route('locale','it')}}" method="POST">
          @csrf
            <button type="submit" class="nav-link" style="background-color:transparent; border:none;">
              <span class="flag-icon flag-icon-it"></span>
            </button>
          </form>
        </li>
        <li class="dropdown-item">
          <form action="{{route('locale','gb')}}" method="POST">
          @csrf
            <button type="submit" class="nav-link" style="background-color:transparent; border:none;">
              <span class="flag-icon flag-icon-gb"></span>
            </button>
          </form>
        </li>
        <li class="dropdown-item">
          <form action="{{route('locale','es')}}" method="POST">
          @csrf
            <button type="submit" class="nav-link" style="background-color:transparent; border:none;">
              <span class="flag-icon flag-icon-es"></span>
            </button>
          </form>
        </li>


        </ul>
      </div>


        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          

          @guest

          {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Fai login</a>
          </li> --}}

          


          <li class="nav-item ms-auto">
            <a class="nav-link" aria-current="page" href="{{route('revisor.workWithUs')}}">{{__('ui.Lavora con noi')}}</a>
          </li>         
          <li class="nav-item ms-auto">
            <a class="nav-link" aria-current="page" href="{{route('login')}}">{{__('ui.Accedi')}}</a>
          </li>
          
          @else
{{-- if revisor --}}
          @if (Auth::user()->is_revisor)    
          <li class="nav-item">
            <a class="nav-link" href="{{route('revisor.index')}}">{{__('ui.Annunci da revisionare')}} 
              <span class="badgee badge-pill badge-warning">{{\App\Models\Article::ToBeRevisionedCount()}}</span> 
            </a>
          </li>
          @else
          <li class="nav-item ms-auto">
            <a class="nav-link" aria-current="page" href="{{route('revisor.workWithUs')}}">{{__('ui.Lavora con noi')}}</a>
          </li> 
          @endif
{{-- end if revisor --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.Ciao, ')}} {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('user_details.index')}}">{{__('ui.Profilo')}}</a></li>
                <li><a class="dropdown-item" href=" {{route('article.articlesByAuth', Auth::id())}}">I tuoi annunci</a></li>
                <li><hr class="dropdown-divider"></li>
                
                <li><a class="dropdown-item" href="" onclick = "event.preventDefault(); document.getElementById('form-logout').submit();">{{__('ui.Esci')}}</a>
                    
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

  