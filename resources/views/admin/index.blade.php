@extends('layout.app')

@section('extra-css')
  {{-- Extra css links here --}}
@endsection

@section('extra-js')
  {{-- Extra js scripts links here --}}
@endsection

{{-- Page title --}}
@section('title', "Inicio Administrador")

{{-- Page content --}}
@section('content')
  <div class="row">

    <!-- New investors -->
    <div class="col-xl-6 col-md-6 mb-4">
      <a href="{{ route('admin.newInvestors') }}" class="text-decoration-none card-link">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nuevos Inversionistas</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $newInvestorsCount }}</div>
              </div>
              <div class="col-auto">
                <i class="card-link-icon fas fa-sign-in-alt fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Investors -->
    <div class="col-xl-6 col-md-6 mb-4">
      <a href="{{ route('admin.investors') }}" class="text-decoration-none card-link">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Inversionistas</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $investorsCount }}</div>
              </div>
              <div class="col-auto">
                <i class="card-link-icon fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <i style="display: inline-block;" class="fas fa-cog text-primary"></i>
          <h6 style="display: inline-block;" class="m-0 font-weight-bold text-primary">Configuraciones</h6>
        </div>
        <div class="card-body">
          <div class="row no-gutters align-items-center mb-3">
            <div class="col-12">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Capital Bajo</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $configuration->low_capital }}</div>
                
              <hr>
            </div>
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Límites Tomar Ganacias</div>
            <div class="col-12 ml-3 mb-3">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Límite 1</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $configuration->take_profit_limit_1 }}</div>
                
            </div>
            <div class="col-12 ml-3 mb-3">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Límite 2</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $configuration->take_profit_limit_2 }}</div>
                
            </div>
            <div class="col-12 ml-3">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Límite 3</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $configuration->take_profit_limit_3 }}</div>
                
            </div>
            <div class="col-12">
              <hr>
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Riesgo</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $configuration->risk }}%</div>
                
            </div>
          </div>
          <a href="{{ route('admin.configurations') }}" class="btn btn-primary btn-block"><i class="fas fa-pencil-alt fa-fw"></i> Editar</a>
        </div>
      </div>
    </div>
  </div>
@endsection