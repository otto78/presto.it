<x-layout>

    <div class="container-fluid margin-top bg-login">

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        
        {{-- bottone torna indietro --}}
        <div class="container-fluid">
                <div class="col-12 d-flex justify-content-end fixed-bottom mb-5 p-5">
                    <a href="{{URL::previous()}}" class="btn btn-presto my-2">{{__('ui.Torna indietro')}}</a>
                </div>   
        </div>

        

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    @if (count($articles)==0)
                    
                        <h3>{{__('ui.Non ci sta nulla')}}</h3>
                    
                    @endif
                    
                    <h1 class=" text-center mt-5" >Categoria: {{$category->category}}</h1>


                    {{-- card --}}

                    <div class="col-12 article mt-3">
                        @foreach ($articles as $article)                        
                        <div class="card-article">
                            <div class="circle">
                                
                                @foreach ($article->images as $image)
                                    @if($article->images->first()==$image) 
                                        <img src="{{$image->getUrl(300, 300)}}" class="img-presto-card" alt="Foto segnaposto">    
                                    @endif                                                                             
                                @endforeach
        
                            </div>
                            <div class="dettagli container-fluid">
                                <div class="mb-4">
                                    <h5>{{$article->title}}</h5>
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

                    {{$articles->links()}}
            </div>
        </div>
        
        
    </div>
        
    </x-layout>