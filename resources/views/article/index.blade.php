<x-layout>

    <div class="container margin-top">

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    @if (count($articles)==0)
                    
                    <h3>Non ci sta nulla</h3>
                    
                    @endif
                    
                        <div class="col-12 mx-auto d-flex flex-wrap justify-content-evenly">
                            @foreach ($articles as $article)
                                    <div class="card" style="width: 18rem;">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                          <h5 class="card-title">{{$article->title}}</h5>
                                          <p class="card-subtitle">categoria</p>
                                          <br>
                                          <p class="card-text">{{$article->description}}</p>
                                          <hr>
                                          <a href="#" class="btn btn-primary">Dettagli</a>
                                        </div>
                                      </div>
                            @endforeach
                        </div>

                </div>
            </div>
        </div>
        
        
    </div>
        
    </x-layout>