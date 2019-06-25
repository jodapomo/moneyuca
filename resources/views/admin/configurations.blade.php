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

  <form method="POST" action="{{ route('admin.configuration.update') }}">
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
          <input
            type="number"
            class="form-control"
            name="low_capital"
            id="low_capital"
            placeholder="Capital bajo"
            value="{{ old('low_capital', $configuration->low_capital) }}"
          >
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
          <input
            type="number"
            class="form-control"
            name="take_proffit_limit_1"
            id="take_proffit_limit_1"
            value="{{ old('take_proffit_limit_1', $configuration->take_proffit_limit_1) }}"
          >
        </div>

        <div class="form-group">
          <label for="take_proffit_limit_2">Límite 2</label>
          <input
            type="number"
            class="form-control"
            name="take_proffit_limit_2"
            id="take_proffit_limit_2"
            value="{{ old('take_proffit_limit_2', $configuration->take_proffit_limit_2) }}"
          >
        </div>

        <div class="form-group">
          <label for="take_proffit_limit_3">Límite 3</label>
          <input
            type="number"
            class="form-control"
            name="take_proffit_limit_3"
            id="take_proffit_limit_3"
            value="{{ old('take_proffit_limit_3', $configuration->take_proffit_limit_3) }}"
          >
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
          <input
            type="number"
            class="form-control"
            name="risk"
            id="risk"
            placeholder="Riesgo"
            value="{{ old('risk', $configuration->risk) }}"
          >
        </div>
      </div>
    </div>


    <div class="row d-flex justify-content-center">

      <button style="margin-right:10px;" class="btn btn-secondary btn-icon-split btn-lg mb-3">
        <span class="icon text-white-50">
          <i class="fas fa-undo-alt"></i>
        </span>
        <span class="text">Restaurar</span>
      </button>

      <button type="submit" style="margin-left:10px;" class="btn btn-primary btn-icon-split btn-lg mb-3">
        <span class="icon text-white-50">
          <i class="fas fa-save"></i>
        </span>
        <span class="text">Guardar cambios</span>
      </button>
    
    </div>

  </form>
@endsection