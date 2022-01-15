<x-layout>
    
    <div class="container margin-top">
      <div class="row mb-5">
        <h1 class="text-center">Profilo</h1>
      </div>
      <div class="row">
        <div class="col-12 col-md-3"><p>Nome</p></div>
        <div class="col-12 col-md-9"><p>{{Auth::user()->name}}</p></div>      
      </div>
      <div class="row">
        <div class="col-12 col-md-3"><p>Email</p></div>
        <div class="col-12 col-md-9"><p>{{Auth::user()->email}}</p></div>      
      </div>
      <div class="row mt-5">
        <div class="col-12"><p>Altre informazioni</p></div>
      </div>     
    </div>               
  
        
    </x-layout>
                      