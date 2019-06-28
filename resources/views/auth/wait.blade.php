@extends('auth.layout')

@section('title', 'Vuelve pronto')

@section('content')

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
    
            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div style="background-image: url('/img/wait.jpg');" class="col-lg-6 d-none d-lg-block"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="login-logo d-flex align-items-center justify-content-center mb-3">
                                <div class="login-brand-logo">
                                    <img src="{{ asset('img/logo.png') }}" alt="">
                                </div>
                                <div class="brand-text mx-3 text-gray-900">MONEYUCA</div>
                            </div>
                            
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">!Espera un poco!</h1>
                            </div>
                            <hr>
                            <div class="text-center">
                                <span>Tienes que esperar hasta que el administrador valide tu cuenta.</span>
                            </div>
                            <hr>
                            @if (Route::has('register'))
                                 <div class="text-center">
                                    {{-- <a href="{{ route('login') }}">Ingresa ya!</a>
                                    o
                                    <a href="{{ route('register') }}">{{ __('Crea una cuenta') }}</a> --}}

                                    <a
                                        class=""
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    >
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </div>
    
        </div>
    
    </div>
      
@endsection


