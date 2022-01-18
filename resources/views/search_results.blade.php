<x-layout>

{{-- vista risultati ricerca --}}

<div class="container-fluid margin-top bg-login">
    <h2 class="text-center pt-5 my-5">Risultati ricerca per</h2>
    <h2 class="text-center my-5">{{$q}}</h2>
    <div class="row justify-content-center">
        
        @if(count($articles)==0)

                    <div>
                        <h2 class="text-center my-10">Purtroppo non ci sono articoli corrispondenti alla tua ricerca!</h2>
                    </div>
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
                              <a href="{{route('article.show', compact('article'))}}" class="btn-presto">Dettagli</a>
                            </div>
                          </div>
                @endforeach
            </div>
            
        

    </div>
</div>


</x-layout>