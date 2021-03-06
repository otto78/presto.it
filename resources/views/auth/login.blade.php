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


<div class="container-fluid bg-login">
    <div class="row section-2 justify-content-center align-items-center">
        <div class="col-12 col-md-6 card shadow p-5" data-aos="zoom-in-up">

            <form method="post" action="{{route('login')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">     
                  </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">{{__('ui.Password')}}</label>
                  <input type="password" name="password" class="form-control" id="InputPassword1">
                </div>
                <button type="submit" class="btn-presto">{{__('ui.Accedi')}}</button>
              </form>
              <p class="mt-3 ">{{__('ui.Se non sei registrato ')}}<span><a class="clicca-qui" href="{{route('register')}}">{{__('ui.Clicca qui')}}</a></span></p>
        </div>
    </div>
</div>

</x-layout>
