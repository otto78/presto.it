<x-layout>

    <div class="container margin-top">

        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    
                    
                        <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">
                            
                                    <div class="card" style="width: 18rem;">
                                        <img src="/img/segnaposto.png" class="card-img-top" alt="Foto segnaposto">
                                        <div class="card-body">
                                          <h5 class="card-title">{{$article->title}}</h5>
                                          @foreach ($article->categories as $category)
                                          
                                          <p class="card-subtitle">{{$category->category}}</p>
                                          <br>
                                        
                                          @endforeach
                                          
                                          <p class="card-text">{{$article->description}}</p>
                                          <p class="card-text">{{$article->price}} €</p>
                                          <p class="card-text">inserito il: {{$article->created_at->format('d/m/Y')}}</p>
                                          <hr>
                                          <a href="{{route('article.index')}}" class="btn btn-primary">Torna indietro</a>
                                          <a href="{{route('article.edit', compact('article'))}}" class="btn btn-warning">Modifica</a>
                                        </div>
                                      </div>
                            
                        </div>

                </div>
            </div>
        </div>
        
        
    </div>
        
    </x-layout>