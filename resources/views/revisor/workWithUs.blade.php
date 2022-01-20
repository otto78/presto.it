<x-layout>

    
    <div class="container-fluid bg-login">
        <div class="row section-2 justify-content-center align-items-center">
            <div class="col-12 col-md-6 card shadow p-5" data-aos="zoom-in-up">
                <p>Hai avuto un'ottima idea a pensare di lavorare con noi. Ci farebbe piacere sepere il perchè!</p>
                <form action="{{route('workWithUsSubmit')}}" method="post">
                    @csrf
                    <textarea name="message" id="" class="form-control" rows="10"></textarea>
                    <button class="btn btn-presto" type="submit">Invia la tua candidatura</button>
                </form>
            </div>
        </div>
    </div>
    
    {{-- 
        <div class="container-fluid margin-top bg-login">
            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <h1 class="text-center my-5">Lavora con noi</h1>
                </div>
            </div>
            <div class="row justify-content-center bg-chiaro" data-aos="zoom-in-up"">
                <div class="col-12" >
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
            
        </div> --}}
</x-layout>