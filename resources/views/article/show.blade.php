<x-layout>
    
    <div class="container margin-top">
        
        
       
            <div class="row justify-content-center shadow">
                <div class="col-12 col-md-6">
                        {{-- Carosello --}}
                    <div id="carouselExampleDark" class="carousel carousel-dark slide m-4 shadow" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div>
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
                                    <h5>{{$article->title}}</h5>
                                    @foreach ($article->categories as $category)
                                    
                                    <p >{{$category->category}}</p>
                                    <br>
                                    
                                    @endforeach
                                    
                                    <p >{{$article->description}}</p>
                                    <p >{{$article->price}} €</p>
                                    <p >Inserito il: {{$article->created_at->format('d/m/Y')}}</p>
                                    <p >Inserito da: <a class ="clicca" href="{{route('article.articlesByUser', $article->user->id)}}">{{$article->user->name}}</a></p>
                                    
                                    <hr>
                                    <a href="{{route('article.index')}}" class="btn btn-presto my-2">Torna indietro</a>
                                    
                                    @if  ($article->user->id==Auth::id())
                                        
                                    <a href="{{route('article.edit', compact('article'))}}" class="btn btn-presto my-2">Modifica</a>
                                        
                                    @endif
                                </div>
                                                
                        </div>    
                    
                
                </div>
                
                   
    </div>
        
    </x-layout>
                      