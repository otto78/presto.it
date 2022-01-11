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
        <div class="col-12 col-md-6 card shadow p-5">

            <form method="post" action="{{route('login')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">     
                  </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="InputPassword1">
                  <div id="exampleInputPassword1" class="form-text">Non condivedere la tua password con nessuno</div>
                </div>
                <button type="submit" class="btn btn-primary">Accedi</button>
              </form>
        </div>
    </div>
</div>

</x-layout>