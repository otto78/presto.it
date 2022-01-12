<x-layout>

<section class="">
    <div class="container-fluid">
        <div class="row masthead justify-content-start align-items-center">
            <div class="col-6 ms-5 px-5 presto-action shadow">
                
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt neque possimus id dolore voluptatibus consequuntur!</p>
                
                <a href="{{route('article.create')}}" class="btn btn-presto"><strong>Inserisci il tuo annuncio</strong></a>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class="container-fluid">
        <div class="row section-2 justify-content-start align-items-center">
            <div class="col-12 my-2">
                <h2 class="text-center">Categorie</h2>
            </div>
                                        {{-- Card Category --}}
                                        <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">
                                            @foreach ($categories as $category)
                                                    <div class="my-2 shadow " style="width: 18rem;">
                                                        <img src="/img/segnaposto.png" class="img-fluid rounded" alt="Foto segnaposto">
                                                        <div class="d-flex justify-content-center">
                                                          {{-- <h5 class="card-title">{{$category->category}}</h5> --}}
                                                          
                                                            <a href="{{route('article.articlesByCategory',[
                                                            $category->category,
                                                            $category->id,
                                                            ])}}" class="btn btn-presto-category mt-2">{{$category->category}}</a>
                                                        </div>
                                                      </div>
                                            @endforeach
                                        </div>                        
        </div>
    </div>

</section>
{{-- Articoli --}}
<section>
    <div class="container-fluid">
        <div class="row section-3 justify-content-start align-items-center">
            <div class="col-12 my-2">
                <h2 class="text-center">Ultimi articoli</h2>
            </div>
                                        
                                            {{-- Card article --}}
                                        <div class="col-12 mx-auto my-4 d-flex flex-wrap justify-content-evenly">
                                            @foreach ($articles as $article)
                                                    <div class="card" style="width: 18rem;">
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
                                                          <p class="card-text">Inserito il: {{$article->created_at->format('d/m/Y')}}</p>
                
                                                          <hr>
                                                          <a href="{{route('article.show', compact('article'))}}" class="btn btn-presto">Dettagli</a>
                                                        </div>
                                                      </div>
                                            @endforeach
                                        </div>

            

           
              
            
        </div>
    </div>
</section>


    
</x-layout>