<x-layout>
    
    @if (session('access.denied.reviso.only'))
        <div class="alert alert-danger">
            {{__('ui.Non sei un revisore!')}}
        </div>
    @endif

    {{-- Masthead --}}
    <section>
        <div class="container-fluid">
            <div class="row masthead justify-content-center align-items-center">
                <div class="col-12 presto-action">
                    <br>
                    <p class="text-center">{{__('ui.Ogni oggetto ha una storia, raccontala e dagli valore!')}}</p>
                    <br>
                    
                    <a href="{{route('article.create')}}" class="btn-presto"><strong>{{__('ui.Inserisci il tuo annuncio')}}</strong></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Sezione categorie --}}
    <section class="mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 my-5">
                    <h2 class="text-center">{{__('ui.Categorie')}}</h2>
                </div>
            </div>    
                
                {{-- Card Category --}}
                <div class="col-12 category">
                    @foreach ($categories as $category)
                    <div class="p-5">
                        <div class="cat-card">
                            <div class="imgbox">
                                <img src="img/segnaposto.png" alt="">
                            </div>
                            <div class="deatals">
                                <a href="{{route('article.articlesByCategory',[
                                $category->category,
                                $category->id,
                                ])}}">{{ $category->category}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>                        
            
        </div>
        
    </section>

    {{-- Sezione Articoli --}}
    <section class="article-body">        
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-5">{{__('ui.Ultimi annunci')}}</h2>
            </div>
            {{-- Cards --}}
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
                        <h4>{{$article->title}}</h4>
                        <h5>{{$article->price}} €</h5>                            
                        <p class="mt-3">{{\Str::limit($article->description, 80)}}</p>                           
                        <p class="d-flex justify-content-between mx-3">
                            <span>
                                @foreach ($article->categories as $category)           
                                <a class="clicca-qui" href="{{route('article.articlesByCategory',[$category->category, $category->id])}}">{{$category->category}}</a>                               
                                @endforeach                                 
                            </span>
                            <span><a class="clicca-qui" href="{{route('article.articlesByUser', $article->user->id)}}">{{$article->user->name}}</a></span> 
                        </p>
                        <a href="{{route('article.show', compact('article'))}}" class="btn-presto shadow">Dettagli</a>
                    </div>
                </div>                                      
                @endforeach
            </div>           
        </div>            
    </section>
    
    
    
    
    
    {{-- Sezione vecchia Articoli --}}
    {{-- <section>
        <div class="container-fluid">
            <div class="row section-3 justify-content-start align-items-center">
                <div class="col-12 my-2">
                    <h2 class="text-center">Ultimi articoli</h2>
                </div>
                
               
                <div class="col-12 mx-auto my-4 d-flex flex-wrap justify-content-evenly ">
                    @foreach ($articles as $article)
                    <div class="card-article" style="width: 18rem;">
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
                                <p class="card-text">Inserito da: <a class ="clicca" href="{{route('article.articlesByUser', $article->user->id)}}">{{$article->user->name}}</a></p>
                                
                                <p class="card-text">Inserito il: {{$article->created_at->format('d/m/Y')}}</p>
                                
                                <hr>
                                <a href="{{route('article.show', compact('article'))}}" class="btn btn-presto">Dettagli</a>
                            </div>
                        </div>
                        @endforeach
                    </div>                
                </div>
            </div>
    </section> --}}

    {{-- Vecchia Card Category --}}
        {{-- <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">
            @foreach ($categories as $category)
                <div class="my-2 shadow " style="width: 18rem;">
                    <img src="/img/segnaposto.png" class="img-fluid rounded" alt="Foto segnaposto">
                    <div class="d-flex justify-content-center">
                        
                        
                        <a href="{{route('article.articlesByCategory',[
                        $category->category,
                        $category->id,
                        ])}}" class="btn btn-presto-category mt-2">{{$category->category}}</a>
                    </div>
                </div>
            @endforeach
        </div>  --}}
              
    </x-layout>