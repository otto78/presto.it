<x-layout>

    <div class="container-fluid margin-top bg-login">
        <div class="row justify-content-center">
            @if ($article)
                <div class="col-12 col-lg-8 margin-top">
                    <div class="card shadow">

                        <div class="card-header py-5">
                            <h2 class="text-center">{{__('ui.Annuncio #')}} {{$article->id}}</h2>
                        </div>    
                        
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"><h3>{{__('ui.Utente')}}:</h3></div>
                                    <div class="col-md-9">
                                        <p>Id: {{$article->user->id}}</p>
                                        <p>Nome: {{$article->user->name}}</p>   
                                        <p>Email: {{$article->user->email}}</p> 
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3"><h3>{{__('ui.Titolo')}}:</h3></div>
                                    <div class="col-md-9">{{$article->title}}</div>
                                </div>
                                <hr>
                                {{-- <div class="row">
                                    <div class="col-md-3"><h3>{{__('ui.Categoria')}}:</h3></div>
                                    <div class="col-md-9">{{$article->category}}</div>
                                </div>
                                <hr> --}}
                                <div class="row">
                                    <div class="col-md-3"><h3>{{__('ui.Prezzo')}}:</h3></div>
                                    <div class="col-md-9">{{$article->price}} €</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3"><h3>{{__('ui.Descrizione')}}:</h3></div>
                                    <div class="col-md-9">{{$article->description}}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3"><h3>{{__('ui.Storia')}}:</h3></div>
                                    <div class="col-md-9">{{$article->story}}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3"><h3>{{__('ui.Immagini')}}:</h3></div>
                                    <div class="col-md-9">
                                        
                                        <div class="row flex-column md-2 my-4">
                                            @foreach($article->images as $image)
                                                <div class="d-flex">

                                                
                                                    <div class="col-md-4 ">
                                                        <img 
                                                            src="{{$image->getUrl(300, 300)}}" class="rounded shadow img-fluid m-2" alt="">
                                                    </div>
                                                    <div class="col-md-8 ps-5">
                                                        <p>Id Immagine: {{$image->id}}</p>
                                                        <p>adult: {{$image->adult}}</p>
                                                        <p>spoof: {{$image->spoof}}</p>
                                                        <p>medical: {{$image->medical}}</p>
                                                        <p>violence: {{$image->violence}}</p>
                                                        <p>racy: {{$image->racy}}</p>
                                                        <p>labels:
                                                            @if($image->labels)
                                                            @foreach($image->labels as $label)
                                                            - {{$label}}
                                                            @endforeach
                                                            @endif    
                                                        </p>
                                                        <hr>

                                                        {{-- <p>Percorso pubblico: {{$image->file}}</p>
                                                        <p>Percorso Server: {{Storage::url($image->file)}}</p>       --}}                                                         
                                                    </div>
                                                </div>
                                            @endforeach 
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>   

                        <div class="card-footer d-flex justify-content-between py-3 mb-5">
                                {{-- Pulsante elimina --}}
                                <form class="my-2" action="{{route('revisor.reject', ['id'=>$article->id])}}" method="post">
                                    @csrf
                                        @method('put')
                                        <button type="submit" class="btn-revisor-reject">{{__('ui.Rifiuta')}}</button>
                                </form>
                            
                                {{-- Pulsante rivaluta --}}
                                <form class="my-2" action="{{route('revisor.indexReject', compact('article'))}}" method="get">
                                    @csrf        
                                    <button type="submit" class="btn-presto"><i class="fas fa-trash-alt"></i></button>
                                </form>

                                {{-- Pulsante accetta --}}
                                <form class="my-2" action="{{route('revisor.accept', ['id'=>$article->id])}}" method="post">
                                    @csrf
                                        @method('put')
                                        <button type="submit" class="btn-revisor-accept">{{__('ui.Accetta')}}</button>
                                </form>                           
                        </div>                   
                </div>
        </div>            
    
        @else

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                
                <div class="my-5 text-center">Non ci sono articoli, torna più tardi</div>
        
                {{-- Pulsante rivaluta --}}
                <form class="my-5 text-center" action="{{route('revisor.indexReject')}}" method="get">
                    @csrf        
                        <button type="submit" class="btn-presto"><i class="fas fa-trash-alt fa-2x"></i></button>
                </form>
            </div>
        </div>
       
        @endif

   </div>



    
</x-layout>