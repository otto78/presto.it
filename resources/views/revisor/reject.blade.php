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
                                          
                                          <p class="card-subtitle">{{$category->category}}</p>
                                          <br>
                                        
                                          @endforeach
                                          <p class="card-text">{{\Str::limit($article->description, 80)}}</p>
                                          <p class="card-text">{{$article->price}} €</p>
                                          <p class="card-text">Inserito da: {{$article->user->name}}</p>

                                          <hr>
                                          <a href="{{route('article.show', compact('article'))}}" class="btn btn-presto">Dettagli</a>
                                          <form class="my-5" action="{{route('revisor.restore', $article->id)}}" method="post">
                                            @csrf
                                                <button type="submit" class="btn btn-presto">Rivaluta</button>
                                            </form>

                                        </div>
                                      </div>
                            @endforeach
                        </div>

                </div>
            </div>
        </div>
        
        
    </div>
        
    </x-layout>