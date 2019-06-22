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
          name="lowCapital"
          id="lowCapital"
          placeholder="Capital bajo"
          value=""
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
        <label for="takeProffitLimit1">Límite 1</label>
        <input
          type="number"
          class="form-control"
          name="takeProffitLimit1"
          id="takeProffitLimit1"
          value=""
        >
      </div>

      <div class="form-group">
        <label for="takeProffitLimit2">Límite 2</label>
        <input
          type="number"
          class="form-control"
          name="takeProffitLimit2"
          id="takeProffitLimit2"
          value=""
        >
      </div>

      <div class="form-group">
        <label for="takeProffitLimit3">Límite 3</label>
        <input
          type="number"
          class="form-control"
          name="takeProffitLimit3"
          id="takeProffitLimit3"
          value=""
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
          value=""
        >
      </div>
    </div>
  </div>


  <button href="" style="margin:0 auto;display:block" class="btn btn-primary btn-icon-split btn-lg mb-3">
    <span class="icon text-white-50">
      <i class="fas fa-save"></i>
    </span>
    <span class="text">Guardar cambios</span>
  </button>
@endsection