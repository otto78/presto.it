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
                <form enctype="multipart/form-data" method="POST" action="{{route('article.store')}}" class="row g-3">
                    @csrf
                    <div class="col-12">
                      <label for="inputTitle" class="form-label">Inserisci qui il titolo del tuo articolo</label>
                      <input type="text" value="{{old('title')}}" name="title" class="form-control" id="inputTitle">
                    </div>
                    <div class="col-12">
                      <label for="inputDescription" class="form-label">Inserisci qui la descrizione del tuo articolo</label>
                      <textarea name="description" id="inputDescription" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div class="col-12">
                      <label for="inputImg" class="form-label">Insserisci l'immagine dell'articolo</label>
                      <input type="file" disabled value="{{old('img')}}" name="image" class="form-control" id="inputImg">
                    </div>
                    <div class="col-md-4">
                      <label for="inputCategory" class="form-label">Scegli la categoria</label>
                      <select id="inputCategory" disabled class="form-select">
                        <option selected>Scegli...</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Aggiungi</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>


    
</x-layout>