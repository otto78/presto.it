<x-layout>

    <div class="container-fluid margin-top bg-login">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <h1 class="text-center mt-5" >Annunci di {{$user->name}}</h1>
                    @if (count($articles)==0)                    
                        <h3 class="text-center my-5">{{__('ui.Non ci sta nulla')}}</h3>                   
                    @endif
                   
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
                                        
                                    <p>Categoria: 
                                        <span>
                                            @foreach ($article->categories as $category)           
                                            <a class="clicca-qui" href="{{route('article.articlesByCategory',[$category->category, $category->id])}}">{{$category->category}}</a>                               
                                            @endforeach                                 
                                        </span>
                                    </p>
                                    <p>Inserito da: 
                                        <span>
                                            <a class="clicca-qui" href="{{route('article.articlesByUser', $article->user->id)}}">{{$article->user->name}}</a>
                                        </span> 
                                    </p>
                                    <a href="{{route('article.show', compact('article'))}}" class="btn-presto shadow">{{__('ui.Dettagli')}}</a>
                                    
                                </div>
                            </div>                                      
                        @endforeach
                    </div>
                
                    <div class="col-12 d-flex justify-content-center my-5">
                        {{$articles->links()}}                      
                    </div>
                
                </div>
            </div>
        
        
        </div>
        
        

    </x-layout>


    {{-- Stato annunci --}}
    
    {{--
                                @if ($articles->count() > 0)
                                    @foreach ($articles as $article)
                                        </p>
                                    
                                            @if ($article->is_accepted == true)
                                
                                                <p class="success">Approvato</p>
                                
                                                @elseif ($article->is_accepted === false)
                                
                                                <p class="reject">Rifiutato</p>
                                
                                                @else
                                
                                                <p class="pending">In revisione</p>
                                
                                            @endif
                                        </p> 
                                    @endforeach
                                @endif
                                
     --}}