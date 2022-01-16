<x-layout>

    <div class="container margin-top">

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    @if (count($articles)==0)
                    
                        <h3>Non ci sta nulla</h3>
                    
                    @endif
                    
                    <h1 class=" text-center mb-5" >Categoria: {{$category->category}}</h1>
                    
                    <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">
                            @foreach ($articles as $article)
                            
                                    <div class="card my-2" style="width: 18rem;">
                                        <img src="/img/segnaposto.png" class="card-img-top" alt="Foto segnaposto">
                                        <div class="card-body">
                                          <h5 class="card-title">{{$article->title}}</h5>
                                          
                                          {{-- @foreach ($article->categories as $category)
                                          
                                          <p class="card-subtitle">{{$category->category}}</p>
                                          <br>
                                        
                                          @endforeach --}}
                                          <p class="card-text">{{\Str::limit($article->description, 80)}}</p>
                                          <p class="card-text">{{$article->price}} €</p>
                                          <p class="card-text">Inserito da: <a class ="clicca" href="{{route('article.articlesByUser', $article->user->id)}}">{{$article->user->name}}</a></p>

                                          <hr>
                                          <a href="{{route('article.show', compact('article'))}}" class="btn btn-presto">Dettagli</a>
                                          <a href="{{URL::previous()}}" class="btn btn-presto my-2">Torna indietro</a>
                                          {{-- <a href="{{route('article.articlesByCategory',[
                                              $articles->category->category,
                                              $articles->category->id,
                                          ])}}" class="btn btn-primary">{{$articles->category->category}}</a> --}}
                                        </div>
                                      </div>
                            
                            @endforeach
                        </div>
                    </div>
                    {{$articles->links()}}
            </div>
        </div>
        
        
    </div>
        
    </x-layout>