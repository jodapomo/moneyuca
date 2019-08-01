@extends('layout.app')

@section('extra-css')
    <style>
        h6 {
            display: inline-block;
            vertical-align: center;
            padding-right: 5px;
        }

        h3 {
            display: inline-block;
            vertical-align: center;
        }

        .edit-button {
            display: inline-block;
            float: right;
        }

        .submit-left-button {
            display: inline-block;
            float: left;
        }
    </style>

@endsection

{{-- Page title --}}
@section('title', "Mi Cuenta")

{{-- Page content --}}
@section('content')

    @if ($message = session('mensaje'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {{ $message }} </strong>
        </div>
    @endif

    {{-- Username --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nombre de Usuario: </h6>
            <h3>{{Auth::user()->username}}</h3>
        </div>
    </div>

    <form novalidate method="POST" action="{{ route('investor.updateName') }}">
        @method('PUT')
        @csrf
        {{-- Name --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nombre: </h6>
                <h3>{{Auth::user()->name}}</h3>
                <button class="btn btn-primary edit-button" type="button" data-toggle="collapse"
                        data-target="#collapseEditName"
                        aria-expanded="false" aria-controls="collapseEditName">
                    Editar
                </button>
            </div>

            <div class="collapse @error('name') show @enderror card-body" id="collapseEditName">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input
                                type="text"
                                class="input-group input-group-prepend mb-3 form-control @error('name') is-invalid @enderror"
                                name="name"
                                id="name"
                                placeholder="Nuevo Nombre"
                        >
                        @error('name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="submit-left-button btn btn-primary">
                            {{ __('Confirmar') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Password --}}
    <form novalidate method="POST" action="{{ route('investor.updatePassword') }}">
        @method('PUT')
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Contraseña </h6>
                <button class="btn btn-primary edit-button" type="button" data-toggle="collapse"
                        data-target="#collapseEditPassword"
                        aria-expanded="false" aria-controls="collapseEditName">
                    Editar
                </button>
            </div>

            <div class="collapse card-body @error('password') show @enderror" id="collapseEditPassword">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input
                                type="password"
                                id="password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                placeholder="{{ __('Nueva Contraseña') }}"
                                name="password"
                                required
                                autocomplete="password"
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
                                id="new-password-confirm"
                                name="password_confirmation"
                                placeholder="{{ __('Confirmar Nueva Contraseña') }}"
                                required
                                autocomplete="new-password"
                        >
                    </div>
                </div>
                <button type="submit" class="align-self-center btn btn-primary">
                    {{ __('Confirmar') }}
                </button>
            </div>
        </div>
    </form>


    {{-- Oanda ID --}}
    <form novalidate method="POST" action="{{ route('investor.updateOandaId') }}">
        @method('PUT')
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ID Oanda</h6>
                <h3>{{Auth::user()->oandaId}}</h3>
                <button class="btn btn-primary edit-button" type="button" data-toggle="collapse"
                        data-target="#collapseEditOandaId"
                        aria-expanded="false" aria-controls="collapseEditOandaId">
                    Editar
                </button>
            </div>

            <div class="collapse card-body @error('oandaId') show @enderror" id="collapseEditOandaId">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input
                                type="text"
                                id="oandaId"
                                name="oandaId"
                                class="form-control form-control-user @error('oandaId') is-invalid @enderror"
                                placeholder="{{ __('Nuevo Id Oanda') }}"
                                autocomplete="off"
                        >
                        @error('oandaId')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="submit-left-button btn btn-primary">
                            {{ __('Confirmar') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Oanda Token --}}
    <form novalidate method="POST" action="{{ route('investor.updateOandaToken') }}">
        @method('PUT')
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Token Oanda</h6>
                <button class="btn btn-primary edit-button" type="button" data-toggle="collapse"
                        data-target="#collapseEditOandaToken"
                        aria-expanded="false" aria-controls="collapseEditOandaToken">
                    Editar
                </button>
            </div>

            <div class="collapse card-body @error('oandaToken') show @enderror" id="collapseEditOandaToken">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input
                                type="text"
                                id="oandaToken"
                                name="oandaToken"
                                class="form-control form-control-user @error('oandaToken') is-invalid @enderror"
                                placeholder="{{ __('Nuevo Token Oanda') }}"
                                autocomplete="off"
                        >
                        @error('oandaToken')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="submit-left-button btn btn-primary">
                            {{ __('Confirmar') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection