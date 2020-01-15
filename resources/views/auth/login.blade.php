@extends('layouts.app')

@section('body-class', 'login-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('/img/city.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Inicio de Sesión</h4>
              </div>
              <p class="description text-center">Ingresa tus datos</p>
              <div class="card-body">
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autofocus>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input placeholder="Contraseña" id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Recordar sesión
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
              </div>
              <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Ingresar</button>
              </div>
              <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
              </a>-->
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('includes.footer')
  </div>
@endsection
