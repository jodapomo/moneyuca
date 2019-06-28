@extends('auth.layout')

@section('title', 'Register')

@section('content')

    <div class="card o-hidden border-0 shadow-lg my-4">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>

                <div class="col-lg-7">
                    <div class="pr-5 pl-5 pb-5 pt-3">
                        <div class="login-logo d-flex align-items-center justify-content-center mb-3">
                            <div class="login-brand-logo">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </div>
                            <div class="brand-text mx-3 text-gray-900">MONEYUCA</div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">¡Crea un cuenta!</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- name --}}
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-control form-control-user  @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    required
                                    autocomplete="name"
                                    autofocus
                                    placeholder="{{ __('Nombre') }}"
                                >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- username --}}
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    class="form-control form-control-user  @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}"
                                    required
                                    autocomplete="username"
                                    autofocus
                                    placeholder="{{ __('Nombre de usuario') }}"
                                >

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- password --}}
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        placeholder="{{ __('Contraseña') }}"
                                        name="password"
                                        required
                                        autocomplete="new-password"
                                    >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input
                                        type="password"
                                        class="form-control form-control-user"
                                        id="password-confirm"
                                        name="password_confirmation"
                                        placeholder="{{ __('Confirmar Contraseña') }}"
                                        required
                                        autocomplete="new-password"
                                    >
                                </div>
                            </div>

                            {{-- oandaId --}}
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="oandaId"
                                    name="oandaId"
                                    class="form-control form-control-user @error('oandaId') is-invalid @enderror"
                                    placeholder="{{ __('Id Oanda (opcional)') }}"
                                    value="{{ old('oandaId') }}"
                                    autocomplete="off"
                                >

                                @error('oandaId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- oandaToken --}}
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="oandaToken"
                                    name="oandaToken"
                                    class="form-control form-control-user @error('oandaToken') is-invalid @enderror"
                                    placeholder="{{ __('Token Oanda (opcional)') }}"
                                    value="{{ old('oandaToken') }}"
                                    autocomplete="off"
                                >

                                @error('oandaToken')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                            </button>

                        </form>

                        <hr>
 
                        <div class="text-center">
                            <a href="{{ route('login') }}">Ya tienes una cuenta? Ingresa ya!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
