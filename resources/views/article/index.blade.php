<x-layout>

    <div class="container margin-top">

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    @if (count($articles)==0)
                    
                    <h3>Non ci sta nulla</h3>
                    
                    @endif
                    
                        <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">
                            @foreach ($articles as $article)
                                    <div class="card" style="width: 18rem;">
                                        <img src="/img/segnaposto.png" class="card-img-top" alt="Foto segnaposto">
                                        <div class="card-body">
                                          <h5 class="card-title">{{$article->title}}</h5>
                                          
                                          @foreach ($article->categories as $category)
                                          
                                          <p class="card-subtitle">{{$category->category}}</p>
                                          <br>
                                        
                                          @endforeach
                                          <p class="card-text">{{$article->description}}</p>
                                          <p class="card-text">{{$article->price}} €</p>
                                          <hr>
                                          <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Dettagli</a>
                                        </div>
                                      </div>
                            @endforeach
                        </div>

                </div>
            </div>
        </div>
        
        
    </div>
        
    </x-layout>