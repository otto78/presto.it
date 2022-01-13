<x-layout>

    @if ($article)
    <div class="container margin-top">
        <div class="row justify-content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Annuncio # {{$article->id}}</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"><h3>Utente</h3></div>
                                <div class="col-md-10">
                                    #{{$article->user->id}},
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
                            <div class="row">
                                <div class="col-md-2"><h3>Immagini</h3></div>
                                <div class="col-md-10">
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <img src="/img/segnaposto.png" alt="segnaposto">
                                        </div>
                                        <div class="col-md-8">... ... ... </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <img src="/img/segnaposto.png" alt="segnaposto">
                                        </div>
                                        <div class="col-md-8">... ... ... </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-mt-5">
            <div class="col-md-6">
                <form action="{{route('revisor.reject', $article->id)}}" method="post">
                @csrf
                    <button type="submit" class="btn btn-presto">Rifiuta</button>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <form action="{{route('revisor.accept', $article->id)}}" method="post">
                @csrf
                    <button type="submit" class="btn btn-presto">Accetta</button>
                </form>
            </div>
        </div>
    </div>

    @else 
    <div>Non ci sono articoli, torna più tardi</div>

    @endif




    
</x-layout>