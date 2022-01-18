<x-layout>
    
    <section class="article-body">        
        <div class="container-fluid margin-top">
            <h1 class="text-center">{{__('ui.Tutti gli annunci')}}</h1>
            
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            
            {{-- <div class="container"> --}}
                <div class="row justify-content-center">
                    <div class="col-12">
                        @if (count($articles)==0)
                        
                        <h3>{{__('ui.Non ci sta nulla')}}</h3>
                        
                        @endif
                        
                        {{-- Cards --}}
                        <div class="col-12 article">
                            @foreach ($articles as $article)                        
                            <div class="card-article">
                                <div class="circle">
                                    
                                    @foreach ($article->images as $image)
                                    @if($article->images->first()==$image)
                                    <img src="{{Storage::url($image->file)}}" class="img-presto-card" alt="Foto segnaposto">      
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
                                    <a href="{{route('article.show', compact('article'))}}" class="btn-presto shadow">{{__('ui.Dettagli')}}</a>
                                </div>
                            </div>                                      
                            @endforeach
                        </div>                      
                    </div>
                </div>
            {{-- </div> --}}
        </section>
    </div>
    
</x-layout>