<x-layout>
    
    <section class="article-body">        
        <div class="container-fluid margin-top">
            <div class="row">
                <div class="col-12-col-md-8">
                  <h1 class="text-center my-5">Tutti gli annunci</h1>
                </div>
            
                @if (session('message'))
                <div class="alert alert-success">
                {{ session('message') }}
                </div>
                @endif
            </div>
            
            {{-- <div class="container"> --}}
            <div class="row justify-content-center">
                    <div class="col-12">
                        
                        @if (count($articles)==0)                       
                            <h3>Non ci articoli</h3>                        
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
                                        
                                    
                                    <a href="{{route('article.show', compact('article'))}}" class="btn-presto shadow">Dettagli</a>
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
    </section>
    
</x-layout>