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
    <h1 class="text-center">Inserisci un annuncio in pochi istanti</h1>

    <div class="row justify-content-center align-items-center shadow">
        <div class="col-12 ">
            <div class="my-4">
                <form enctype="multipart/form-data" method="POST" action="{{route('article.store')}}" class="row g-3">
                    @csrf
                    <div class="col-12">
                      <label for="inputTitle" class="form-label">Inserisci qui il titolo del tuo articolo</label>
                      <input type="text" value="{{old('title')}}" name="title" class="form-control" id="inputTitle">
                    </div>
                    <div class="col-12">
                      <label for="inputImg" class="form-label">Inserisci l'immagine dell'articolo</label>
                      <input type="file" disabled value="{{old('img')}}" name="image" class="form-control" id="inputImg">
                    </div>
                    <div class="col-12">
                      <label for="inputDescription" class="form-label">Inserisci qui la descrizione del tuo articolo</label>
                      <textarea name="description" id="inputDescription" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div class="col-12">
                      <label for="inputCategory" class="form-label">Scegli la categoria</label>
                      <select id="inputCategory" name="categories[]" class="form-control">
                        <option selected>Scegli...</option>
                        @foreach ($categories as $category)
                        
                        <option value="{{$category->id}}">{{$category->category}}</option>
                            
                        @endforeach


                      </select>
                    </div>
                    <div class="col-12">
                      <label for="inputPrice" class="form-label">Inserisci qui il prezzo</label>
                      <input type="text" value="{{old('price')}}" name="price" class="form-control" id="inputPrice">
                    </div>
                    <div class="col-6">
                      <button type="submit" class="btn btn-presto">Aggiungi</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>


    
</x-layout>