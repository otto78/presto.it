<x-layout>
    
    <div class="container-fluid margin-top bg-login">
      <div class="row mb-5">
        <h1 class="text-center my-5">{{__('ui.Profilo')}}</h1>
      </div>
      <div class="row">
        <div class="col-12 col-md-4"><h4>{{__('ui.Nome e cognome: ')}}</h4></div>
        <div class="col-12 col-md-8"><p>{{Auth::user()->name}}</p></div>      
      </div>
      <br>
      <div class="row">
        <div class="col-12 col-md-4"><h4>Email: </h4></div>
        <div class="col-12 col-md-8"><p>{{Auth::user()->email}}</p></div>      
      </div>
      <br>
      {{-- <div class="row mt-5">
        <div class="col-12"><p>{{__('ui.Altre informazioni')}}</p></div>
      </div>      --}}
    </div>               
  
        
    </x-layout>
                      