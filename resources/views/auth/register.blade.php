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

            <form method="post" action="{{route('register')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputName" class="form-label">{{__('ui.Nome e cognome')}}</label>
                  <input type="text" name="name" class="form-control" id="InputName" aria-describedby="nameHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">     
                  </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">{{__('ui.Password')}}</label>
                  <input type="password" name="password" class="form-control" id="InputPassword1">
                  <div id="exampleInputPassword1" class="form-text">{{__('ui.Non condividere la tua password con nessuno')}}</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPasswordConfirmation" class="form-label">{{__('ui.Conferma la password')}}</label>
                    <input type="password" name="password_confirmation" class="form-control" id="InputPasswordConfirmation">
                  </div>
                <button type="submit" class="btn-presto">{{__('ui.Registrati')}}</button>
              </form>
        </div>
    </div>
</div>


</x-layout>