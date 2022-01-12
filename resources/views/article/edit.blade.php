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

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 md-6 ">
            <div class="margin-top">
                <form enctype="multipart/form-data" method="POST" action="{{route('article.update', compact('article'))}}" class="row g-3">
                    @csrf
                    @method('put')
                    <div class="col-12">
                      <label for="inputTitle" class="form-label">Modifica il titolo del tuo articolo</label>
                      <input type="text" value="{{$article->title}}" name="title" class="form-control" id="inputTitle">
                    </div>
                    <div class="col-12">
                      <label for="inputDescription" class="form-label">Modifica la descrizione del tuo articolo</label>
                      <textarea name="description" id="inputDescription" class="form-control">{{$article->description}}</textarea>
                    </div>
                    <div class="col-12">
                      <label for="inputImg" class="form-label">Modifica l'immagine dell'articolo</label>
                      <input type="file" disabled value="{{old('img')}}" name="image" class="form-control" id="inputImg">
                    </div>
                    <div class="col-md-4">
                      <label for="inputCategory" class="form-label">Cambia la categoria</label>
                      <select id="inputCategory" name="categories[]" class="form-control">
                        <option selected>Scegli...</option>
                        @foreach ($categories as $category)                      
                          <option value="{{$category->id}}">{{$category->category}}</option>                           
                        @endforeach
                      </select>
                    </div>
                    <div class="col-12">
                        <label for="inputPrice" class="form-label">Modifica qui il prezzo</label>
                        <input type="text" value="{{$article->price}}" name="price" class="form-control" id="inputPrice">
                      </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-presto">Modifica</button>
                    </div>
                  </form>
                  <form method="post" action="{{route('article.destroy', compact('article'))}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-warning">Cancella</button>
                  </form>
            </div>
        </div>
    </div>
</div>


    
</x-layout>