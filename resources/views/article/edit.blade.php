<x-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container margin-top">

    <div class="row justify-content-center align-items-center shadow">
        <div class="col-12">
            
                <form enctype="multipart/form-data" method="POST" action="{{route('article.update', compact('article'))}}" class="row g-3 my-4">
                    @csrf
                    @method('put')
                    <div class="col-12">
                      <label for="inputTitle" class="form-label">{{__('ui.Modifica il titolo del tuo annuncio')}}</label>
                      <input type="text" value="{{$article->title}}" name="title" class="form-control" id="inputTitle">
                    </div>
                    <div class="col-12">
                      <label for="inputDescription" class="form-label">{{__('ui.Modifica la descrizione del tuo articolo')}}</label>
                      <textarea name="description" id="inputDescription" class="form-control">{{$article->description}}</textarea>
                    </div>
                    <div class="col-12">
                      <label for="inputImg" class="form-label">{{__("ui.Cambia le immagini dell'annuncio")}}</label>
                      <input type="file" disabled value="{{old('img')}}" name="image" class="form-control" id="inputImg">
                    </div>
                    <div class="col-12">
                      <label for="inputCategory" class="form-label">{{__('ui.Cambia la categoria')}}</label>
                      <select id="inputCategory" name="categories[]" class="form-control">
                       
                        
                        {{-- <option @if($article->categories->contains('id', $category->id))selected @endif>Scegli...</option> --}}
                        

                        @foreach ($categories as $category)                      
                          <option value="{{$category->id}}"@if($article->categories->contains('id', $category->id))selected @endif>{{$category->category}}</option>                           
                        @endforeach
                      </select>
                    </div>
                    <div class="col-12">
                        <label for="inputPrice" class="form-label">{{__('ui.Modifica qui il prezzo')}}</label>
                        <input type="text" value="{{$article->price}}" name="price" class="form-control" id="inputPrice">
                    </div>
                    <form method="post" action="{{route('article.edit', compact('article'))}}">
                      @csrf
                      @method('put')
                      <button type="submit" class="btn btn-presto">{{__('ui.Salva')}}</button>
                      </form>
                    {{-- <div class="col-6">
                      <button type="submit" class="btn btn-presto">Modifica</button>
                    </div> --}}
                  </form>
                  <div class="col-6 mb-4">
                      <form method="post" action="{{route('article.destroy', compact('article'))}}">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-presto">{{__('ui.Elimina')}}</button>
                      </form>
                  <div class="col-12 mt-4">
                    <a href="{{route('article.show', compact('article'))}}" class="btn btn-presto">{{__('ui.Torna indietro')}}</a>
                  </div>
                </div>
                  
            
        </div>
    </div>



  </div>


    
</x-layout>