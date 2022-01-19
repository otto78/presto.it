<x-layout>
    
    <div class="container margin-top">
      <div class="row mb-5">
        <h1 class="text-center">{{__('ui.Profilo')}}</h1>
      </div>
      <div class="row">
        <div class="col-12 col-md-3"><p>{{__('ui.Nome e cognome')}}</p></div>
        <div class="col-12 col-md-9"><p>{{Auth::user()->name}}</p></div>      
      </div>
      <div class="row">
        <div class="col-12 col-md-3"><p>Email</p></div>
        <div class="col-12 col-md-9"><p>{{Auth::user()->email}}</p></div>      
      </div>
      <div class="row mt-5">
        <div class="col-12"><p>{{__('ui.Altre informazioni')}}</p></div>
      </div>     
    </div>               
  
        
    </x-layout>
                      