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


<div class="container ">
    <div class="row section-2 justify-content-center align-items-center">
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
                </div>
                <button type="submit" class="btn btn-presto">Accedi</button>
              </form>
              <p class="mt-3 ">Se non sei registrato <span><a class="clicca" href="{{route('register')}}">clicca qui</a></span></p>
        </div>
    </div>
</div>

</x-layout>
