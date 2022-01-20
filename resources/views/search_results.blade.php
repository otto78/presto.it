<x-layout>

{{-- vista risultati ricerca --}}

<div class="container-fluid margin-top bg-login">
    <h2 class="text-center pt-5 my-5">Risultati ricerca per:</h2>
    <h2 class="text-center my-5">"{{$q}}"</h2>
    <div class="row justify-content-center">
        
        @if(count($articles)==0)

                    <div>
                        <h2 class="text-center my-10">Purtroppo non ci sono articoli corrispondenti alla tua ricerca!</h2>
                    </div>
        @endif

        {{-- <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">        
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
        </div> --}}
            
        <div class="col-12 article">
            @foreach ($articles as $article)                        
            <div class="card-article">
                <div class="circle">
                    
                    @foreach ($article->images as $image)
                        @if($article->images->first()==$image) 
                            <img src="{{$image->getUrl(300, 300)}}" class="img-presto-card" alt="Foto segnaposto">    
                        @endif                                                                             
                    @endforeach

                </div>
                <div class="dettagli">
                    <div class="mb-4">
                        <h4>{{$article->title}}</h4>
                    </div>
                    <div class="mb-4">
                    <h5>{{$article->price}} €</h5>
                    </div>

                    {{-- <p class="mt-3">{{\Str::limit($article->description, 80)}}</p>                            --}}
                    <p> Categoria: 
                        <span>
                            @foreach ($article->categories as $category)           
                            <a class="clicca-qui" href="{{route('article.articlesByCategory',[$category->category, $category->id])}}">{{$category->category}}</a>                               
                            @endforeach                                 
                        </span>
                    </p>
                    <p> Inserito da: 
                        <span>
                            <a class="clicca-qui" href="{{route('article.articlesByUser', $article->user->id)}}">{{$article->user->name}}</a>
                        </span> 
                    </p>
                    <a href="{{route('article.show', compact('article'))}}" class="btn-presto shadow">{{__('ui.Dettagli')}}</a>
                </div>
            </div>                                      
            @endforeach
        </div>

    </div>
</div>


</x-layout>