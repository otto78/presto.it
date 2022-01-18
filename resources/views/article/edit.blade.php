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

<div class="container-fluid margin-top bg-login">
  <div class="row">
    <div class="col-12-col-md-8">
      <h1 class="text-center my-5">Modifica un annuncio in pochi istanti</h1>
    </div>
  </div>

    <div class="row justify-content-center align-items-center ">
        <div class="col-12 col-lg-8 shadow bg-chiaro p-4 my-4">
            
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
                        <div class="row py-5">

                        
                              {{-- Pulsante modifica --}}
                              <div class="col-4">
                                  <form method="post" action="{{route('article.edit', compact('article'))}}">
                                      @csrf
                                      @method('put')
                                        <button type="submit" class="btn-presto">Modifica</button>
                                  </form>
                              </div>
                                                              
                              {{-- Pulsante elimina --}}
                              <div class="col-4">
                                  <form method="post" action="{{route('article.destroy', compact('article'))}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-presto">Cancella</button>
                                  </form>
                              </div>

                              {{-- Pulsante torna indietro --}}
                              <div class="col-4">
                                  <a href="{{route('article.show', compact('article'))}}" class="btn-presto">Torna indietro</a>
                                </div>


                            
                              
                        
                          </div>
                          </div>
                  </form>
      </div>



  </div>


    
</x-layout>