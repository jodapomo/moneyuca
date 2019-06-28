@extends('auth.layout')

@section('title', 'Login')

@section('content')

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
    
            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="login-logo d-flex align-items-center justify-content-center mb-3">
                                <div class="login-brand-logo">
                                    <img src="{{ asset('img/logo.png') }}" alt="">
                                </div>
                                <div class="brand-text mx-3 text-gray-900">MONEYUCA</div>
                            </div>
                            
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de nuevo!</h1>
                            </div>

                            <form class="user" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <input
                                        type="text"
                                        id="username"
                                        class="form-control form-control-user @error('username') is-invalid @enderror"
                                        placeholder="{{ __('Nombre de usuario') }}"
                                        name="username" value="{{ old('username') }}"
                                        required
                                        autocomplete="username"
                                        autofocus
                                    >
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        placeholder="{{ __('Contraseña') }}"
                                    >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="remember">
                                            {{ __('Recuérdame') }}
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Entrar') }}
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    
        </div>
    
    </div>
      
@endsection


