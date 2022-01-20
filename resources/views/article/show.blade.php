<x-layout>
    
  <div class="container-fluid bg-login">

    
    
    <div class="container margin-top">
      <div class="row">
        <div class="col-12-col-md-8">
          <h1 class="text-center my-5">Dettagli dell'annuncio</h1>
        </div>
      </div>
        
       
            <div class="row justify-content-center shadow bg-chiaro">
                <div class="col-12 col-md-6 ">
                        {{-- Carosello --}}
                    <div id="carouselExampleDark" class="carousel carousel-dark slide m-4 shadow" data-bs-ride="carousel">
                        {{-- <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div> --}}
                        <div class="carousel-inner">
                          <div class="carousel-item active" data-bs-interval="10000">
                            <img src="/img/segnaposto.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">                              
                            </div>
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img src="/img/segnaposto.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">                              
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="/img/segnaposto.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">                             
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="/img/segnaposto.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">                             
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="/img/segnaposto.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">                             
                            </div>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    
                      {{-- Resto delle cose --}}
                    
                    </div>
                        <div class="col-12 col-md-6">
                                                                            
                                <div class="my-4">
                                    <h2>{{$article->title}}</h2>
                                    <br>
                                    <h4>{{$article->price}} €</h4>
                                    <br>
                                    <p><strong>Descrizione</strong></p>
                                    <p>{{$article->description}}</p>
                                    <p><strong>Storia</strong></p>
                                    <p>{{$article->story}}</p>
                                    <hr>
                                    
                                    <p>
                                      <span>Inserito in
                                        @foreach ($article->categories as $category)
                                      
                                        <a class="clicca-qui" href="{{route('article.articlesByCategory',[$category->category, $category->id])}}">{{$category->category}}</a>
                                      
                                        @endforeach
                                      </span>
                                      <span>
                                        il {{$article->created_at->format('d/m/Y')}}
                                      </span>
                                      <span>
                                        da <a class ="clicca-qui" href="{{route('article.articlesByUser', $article->user->id)}}">{{$article->user->name}}</a>
                                      </span> 
                                    </p>
                                   

                                    
                                    
                                    <hr>
                                    <a href="{{route('article.index')}}" class="btn-presto my-2">{{__('ui.Torna indietro')}}</a>
                                    
                                    @if  ($article->user->id==Auth::id())
                                        
                                    <a href="{{route('article.edit', compact('article'))}}" class="btn-presto my-2">{{__('ui.Modifica')}}</a>
                                        
                                    @endif
                                </div>
                                                
                        </div>    
                    
                
                </div>
                
                   
    </div>
  </div>
        
    </x-layout>
                      