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
                            <h1 class="h4 text-gray-900 mb-4">Crea un cuenta!</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf

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
                                    placeholder="{{ __('Name') }}"
                                >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    placeholder="{{ __('E-Mail Address') }}"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        placeholder="{{ __('Password') }}"
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
                                        placeholder="{{ __('Confirm Password') }}"
                                        required
                                        autocomplete="new-password"
                                    >
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                            </button>

                        </form>

                        <hr>

                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
