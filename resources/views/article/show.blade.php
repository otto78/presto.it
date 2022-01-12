<x-layout>

    <div class="container margin-top">

        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    
                    
                        <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">
                            
                                    <div class="card" style="width: 18rem;">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                          <h5 class="card-title">{{$article->title}}</h5>
                                          <p class="card-subtitle">categoria</p>
                                          <br>
                                          <p class="card-text">{{$article->description}}</p>
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