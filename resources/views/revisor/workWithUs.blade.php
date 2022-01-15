<x-layout>
    <div class="container margin-top">
        <div class="row mb-5 justify-content-center">
            <div class="col-12">
                <h1 class="text-center">Lavora con noi</h1>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <p>Hai avuto un'ottima idea a pensare di lavorare con noi. Ci farebbe piacere sepere il perchè!</p>
            </div>
            <div class="col-12 mt-5">
                <form action="{{route('workWithUsSubmit')}}" method="post">
                    @csrf
                    <textarea name="message" id="" class="form-control" rows="10"></textarea>
                <button class="btn btn-presto" type="submit">Invia la tua candidatura</button>
            </form>
        </div>
        </div>
        
    </div>

</x-layout>