<x-layout>

{{-- vista risultati ricerca --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>
                Risultati ricerca per {{$q}}
            </h2>
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
                            </div>
                          </div>
                @endforeach
            </div>


        </div>

    </div>
</div>


</x-layout>