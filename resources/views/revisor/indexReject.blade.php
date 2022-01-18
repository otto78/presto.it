<x-layout>
    
    <div class="container margin-top">
        <h1 class="text-center">Tutti gli articoli da rivalutare</h1>
        
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    {{-- @if (count($articles)==0)
                        
                        <h3>Non ci sta nulla</h3>
                        
                        @endif --}}
                        
                        <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">
                            @foreach ($articles as $article)
                            <div class="card my-3" style="width: 18rem;">
                                @foreach ($article->images as $image)
                                    @if($article->images->first()==$image) 
                                        <img src="{{$image->getUrl(300, 300)}}" class="img-presto-card" alt="Foto segnaposto">    
                                    @endif                                                                             
                                @endforeach
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
                                    <form class="my-5" action="{{route('revisor.restore', $article->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn-presto">Rivaluta</button>
                                    </form>
                                    
                                </div>
                            </div>
                            @endforeach
                            <form class="my-5" action="{{route('revisor.index', compact('article'))}}" method="get">
                                @csrf                                
                                <button type="submit" class="btn-presto">Torna indietro</button>
                            </form>
                            {{-- <form class="my-5" action="{{route('revisor.indexReject', compact('article'))}}" method="get">
                                @csrf                                
                                <button type="submit" class="btn btn-presto">Torna indietro</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        
    </x-layout>
    