<x-layout>

    <div class="container-fluid margin-top bg-login">
        <div class="row justify-content-center">
            @if ($article)
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Annuncio # {{$article->id}}</h2>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"><h3>Utente</h3></div>
                                <div class="col-md-9">
                                    <p>Id: {{$article->user->id}}</p>
                                    <p>Nome: {{$article->user->name}}</p>   
                                    <p>Email: {{$article->user->email}}</p> 
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3"><h3>Titolo</h3></div>
                                <div class="col-md-9">{{$article->title}}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3"><h3>Prezzo</h3></div>
                                <div class="col-md-9">{{$article->price}} €</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3"><h3>Descrizione</h3></div>
                                <div class="col-md-9">{{$article->description}}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3"><h3>Storia</h3></div>
                                <div class="col-md-9">{{$article->story}}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3"><h3>Immagini</h3></div>
                                <div class="col-md-9">
                                    
                                    <div class="row md-2 my-4">
                                        @foreach($article->images as $image)
                                            <div class="col-md-4 ">
                                                <img 
                                                    src="{{$image->getUrl(300, 300)}}" class="rounded shadow img-fluid m-2" alt="">
                                            </div>
                                            {{-- <div class="col-md-8">
                                                <p>Id Immagine: {{$image->id}}</p>
                                                <p>Percorso pubblico: {{$image->file}}</p>
                                                <p>Percorso Server: {{Storage::url($image->file)}}</p>                                                               
                                            </div> --}}
                                            
                                        @endforeach 
                                    </div>
                                    

                                                                       
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="row justify-content-center">
            <div class="col-8">

                <form class="my-2" action="{{route('revisor.reject', ['id'=>$article->id])}}" method="post">
                    @csrf
                        @method('put')
                        <button type="submit" class="btn-presto">Rifiuta</button>
                </form>
    
                <form class="my-2" action="{{route('revisor.accept', ['id'=>$article->id])}}" method="post">
                    @csrf
                        @method('put')
                        <button type="submit" class="btn-presto">Accetta</button>
                </form>
                
                <form class="my-5" action="{{route('revisor.indexReject', compact('article'))}}" method="get">
                    @csrf        
                        <button type="submit" class="btn-presto">Rivaluta</button>
                </form>

            </div>

            
        </div>
    </div>

    @else 
    <div>Non ci sono articoli, torna più tardi</div>

    @endif

    <form class="my-5" action="{{route('revisor.indexReject', compact('article'))}}" method="get">
        @csrf        
            <button type="submit" class="btn-presto">Rivaluta</button>
        </form>

   



    
</x-layout>