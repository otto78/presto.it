<x-layout>

    <div class="container margin-top">
        <h1 class="text-center">Tutti gli articoli</h1>

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
                    
                        <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">
                            @foreach ($articles as $article)
                                    <div class="card my-3" style="width: 18rem;">
                                        <img src="/img/segnaposto.png" class="card-img-top" alt="Foto segnaposto">
                                        <div class="card-body">
                                          <h5 class="card-title">{{$article->title}}</h5>
                                          
                                          @foreach ($article->categories as $category)
                                          
                                          <p class="card-subtitle"><a href="{{route('article.articlesByCategory',[
                                            $category->category,
                                            $category->id,
                                            ])}}" class="clicca mt-2">{{$category->category}}</a></p>
                                          <br>
                                        
                                          @endforeach
                                          <p class="card-text">{{\Str::limit($article->description, 80)}}</p>
                                          <p class="card-text">{{$article->price}} €</p>
                                          <p class="card-text">Inserito da: <a class ="clicca" href="{{--{{route('article.articlesByUser', $article->user->id)}}">{{$article->user->name}}--}}</a></p>

                                          <hr>
                                          <a href="{{route('article.show', compact('article'))}}" class="btn btn-presto">Dettagli</a>
                                        </div>
                                      </div>
                            @endforeach
                        </div>

                </div>
            </div>
        </div>
        
        
    </div>
        
    </x-layout>