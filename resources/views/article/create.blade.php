<x-layout>
  
  <div class="container margin-top">
    <h1 class="text-center">{{__('ui.Inserisci un annuncio in pochi istanti')}}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="row justify-content-center align-items-center shadow">
        <div class="col-12 ">
            <div class="my-4">
                <form enctype="multipart/form-data" method="POST" action="{{route('article.store')}}" class="row g-3">
                    @csrf

                    
                    <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">


                    <div class="col-12">
                      <label for="inputTitle" class="form-label">{{__('ui.Inserisci qui il titolo del tuo annuncio')}}</label>
                      <input type="text" value="{{old('title')}}" name="title" class="form-control" id="inputTitle">
                    </div>
                    <div class="col-12">

                      <label for="drophere" class="form-label">{{__('ui.Inserisci una o più immagini')}}</label>
                      <div class="dropzone" id="drophere"></div>

                      
                      {{-- <input type="file" disabled value="{{old('img')}}" name="image" class="form-control" id="inputImg"> --}}
                    
                    </div>
                    <div class="col-12">
                      <label for="inputDescription" class="form-label">{{__('ui.Inserisci qui la descrizione del tuo articolo')}}</label>
                      <textarea name="description" id="inputDescription" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div class="col-12">
                      <label for="inputStory" class="form-label">{{__('ui.Inserisci qui la storia del tuo articolo')}}</label>
                      <textarea name="story" id="inputStory" class="form-control">{{old('story')}}</textarea>
                    </div>
                    <div class="col-12">
                      <label for="inputCategory" class="form-label">{{__('ui.Inserisci la categoria scegliendone una qui sotto')}}</label>
                      <select id="inputCategory" name="categories[]" class="form-control">
                        {{-- <option selected>Scegli...</option> --}}
                        @foreach ($categories as $category)
                        
                        <option value="{{$category->id}}">{{$category->category}}</option>
                            
                        @endforeach


                      </select>
                    </div>
                    <div class="col-12">
                      <label for="inputPrice" class="form-label">{{__('ui.Inserisci qui il prezzo')}}</label>
                      <input type="text" value="{{old('price')}}" name="price" class="form-control" id="inputPrice">
                    </div>
                    <div class="col-6">
                      <button type="submit" class="btn btn-presto">{{__('ui.Crea')}}</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>


    
</x-layout>