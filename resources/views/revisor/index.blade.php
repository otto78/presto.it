<x-layout>

    <div class="container margin-top">
        <div class="row justify-content">
            @if ($article)
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Annuncio # {{$article->id}}</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"><h3>Utente</h3></div>
                                <div class="col-md-10">
                                    {{$article->user->id}},
                                    {{$article->user->name}},
                                    {{$article->user->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><h3>Titolo</h3></div>
                                <div class="col-md-10">{{$article->title}}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><h3>Descrizione</h3></div>
                                <div class="col-md-10">{{$article->description}}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><h3>Immagini</h3></div>
                                <div class="col-md-10">
                                    <div class="row mb-2">
                                        <div class="col-md-2">
                                            <img src="/img/segnaposto.png" class="immg-fluid" alt="segnaposto">
                                        </div>
                                        <div class="col-md-10">... ... ... </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-2">
                                            <img src="/img/segnaposto.png" class="immg-fluid" alt="segnaposto">
                                        </div>
                                        <div class="col-md-10">... ... ... </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <form class="my-2" action="{{route('revisor.reject', ['id'=>$article->id])}}" method="post">
                    @csrf
                        @method('put')
                        <button type="submit" class="btn btn-presto">Rifiuta</button>
                </form>
                <form class="my-2" action="{{route('revisor.accept', ['id'=>$article->id])}}" method="post">
                    @csrf
                        @method('put')
                        <button type="submit" class="btn btn-presto">Accetta</button>
                </form>
                
                <form class="my-5" action="{{route('revisor.indexReject', compact('article'))}}" method="get">
                    @csrf        
                        <button type="submit" class="btn btn-presto">Rivaluta</button>
                </form>
            </div>
        </div>
        
    </div>

    @else 
    <div>Non ci sono articoli, torna più tardi</div>

    @endif

    <form class="my-5" action="{{route('revisor.indexReject', compact('article'))}}" method="get">
        @csrf        
            <button type="submit" class="btn btn-presto">Rivaluta</button>
        </form>

   



    
</x-layout>