@extends('layout.app')

@section('extra-css')
  {{-- Extra css links here --}}
@endsection

@section('extra-js')
  {{-- Extra js scripts links here --}}
@endsection

{{-- Page title --}}
@section('title', "Configuraciones")

{{-- Page content --}}
@section('content')

  <form novalidate method="POST" action="{{ route('admin.configuration.update') }}">
    @method('PUT')  
    @csrf

    {{-- Low Capital --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Capital Bajo</h6>
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias at unde dolore ipsam fugit, vero inventore animi tenetur minima consectetur dolorum quas aperiam exercitationem quos, id rem aliquid expedita error.</p>
        <div class="form-group">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>
            <input
              type="number"
              class="form-control @error('low_capital') is-invalid @enderror"
              name="low_capital"
              id="low_capital"
              placeholder="Capital bajo"
              value="{{ $configuration->low_capital }}"
            >
            @error('low_capital')
              <div  class="invalid-feedback" role="alert">
                {{ $message }}
              </div >
            @enderror
          </div>
        </div>
      </div>
    </div>

    {{-- takeProffitLimit --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Límite Tomar Ganacias</h6>
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias at unde dolore ipsam fugit, vero inventore animi tenetur minima consectetur dolorum quas aperiam exercitationem quos, id rem aliquid expedita error.</p>

        <div class="form-group">
          <label for="take_proffit_limit_1">Límite 1</label>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input
                type="number"
                class="form-control @error('take_proffit_limit_1') is-invalid @enderror"
                name="take_proffit_limit_1"
                id="take_proffit_limit_1"
                value="{{ $configuration->take_proffit_limit_1 }}"
              >
              @error('take_proffit_limit_1')
                <div  class="invalid-feedback" role="alert">
                  {{ $message }}
                </div >
              @enderror
            </div>
        </div>

        <div class="form-group">
          <label for="take_proffit_limit_2">Límite 2</label>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input
                type="number"
                class="form-control @error('take_proffit_limit_2') is-invalid @enderror"
                name="take_proffit_limit_2"
                id="take_proffit_limit_2"
                value="{{ $configuration->take_proffit_limit_2 }}"
              >
              @error('take_proffit_limit_2')
                <div  class="invalid-feedback" role="alert">
                  {{ $message }}
                </div >
              @enderror
            </div>
        </div>

        <div class="form-group">
          <label for="take_proffit_limit_3">Límite 3</label>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input
                type="number"
                class="form-control @error('take_proffit_limit_3') is-invalid @enderror"
                name="take_proffit_limit_3"
                id="take_proffit_limit_3"
                value="{{ $configuration->take_proffit_limit_3 }}"
              >
              @error('take_proffit_limit_3')
                <div  class="invalid-feedback" role="alert">
                  {{ $message }}
                </div >
              @enderror
            </div>
        </div>
      </div>
    </div>

    {{-- Risk --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Riesgo</h6>
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias at unde dolore ipsam fugit, vero inventore animi tenetur minima consectetur dolorum quas aperiam exercitationem quos, id rem aliquid expedita error.</p>
        <div class="form-group">
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">%</span>
              </div>
              <input
                type="number"
                class="form-control @error('risk') is-invalid @enderror"
                name="risk"
                id="risk"
                placeholder="Riesgo"
                value="{{ $configuration->risk }}"
              >
              @error('risk')
                <div  class="invalid-feedback" role="alert">
                  {{ $message }}
                </div >
              @enderror
            </div>
        </div>
      </div>
    </div>


    <div class="row d-flex justify-content-center">

      <a href="{{ route('admin.configurations') }}" style="margin-right:10px;" class="btn btn-secondary btn-icon-split btn-lg mb-3">
        <span class="icon text-white-50">
          <i class="fas fa-undo-alt"></i>
        </span>
        <span class="text">Restaurar</span>
      </a>

      <button type="submit" style="margin-left:10px;" class="btn btn-primary btn-icon-split btn-lg mb-3">
        <span class="icon text-white-50">
          <i class="fas fa-save"></i>
        </span>
        <span class="text">Guardar cambios</span>
      </button>
    
    </div>

  </form>
@endsection