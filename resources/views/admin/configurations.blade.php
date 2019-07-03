@extends('layout.app')

@section('extra-css')
  {{-- Extra css links here --}}
@endsection

@section('extra-js')
  @if ( session('success') )    
    <script>
      $(document).ready(function() {
        $('#exampleModalCenter').modal('show');
      });
    </script>
  @endif
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

    {{-- takeProfitLimit --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Límite Tomar Ganacias</h6>
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias at unde dolore ipsam fugit, vero inventore animi tenetur minima consectetur dolorum quas aperiam exercitationem quos, id rem aliquid expedita error.</p>

        <div class="form-group">
          <label for="take_profit_limit_1">Límite 1</label>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input
                type="number"
                class="form-control @error('take_profit_limit_1') is-invalid @enderror"
                name="take_profit_limit_1"
                id="take_profit_limit_1"
                value="{{ $configuration->take_profit_limit_1 }}"
              >
              @error('take_profit_limit_1')
                <div  class="invalid-feedback" role="alert">
                  {{ $message }}
                </div >
              @enderror
            </div>
        </div>

        <div class="form-group">
          <label for="take_profit_limit_2">Límite 2</label>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input
                type="number"
                class="form-control @error('take_profit_limit_2') is-invalid @enderror"
                name="take_profit_limit_2"
                id="take_profit_limit_2"
                value="{{ $configuration->take_profit_limit_2 }}"
              >
              @error('take_profit_limit_2')
                <div  class="invalid-feedback" role="alert">
                  {{ $message }}
                </div >
              @enderror
            </div>
        </div>

        <div class="form-group">
          <label for="take_profit_limit_3">Límite 3</label>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input
                type="number"
                class="form-control @error('take_profit_limit_3') is-invalid @enderror"
                name="take_profit_limit_3"
                id="take_profit_limit_3"
                value="{{ $configuration->take_profit_limit_3 }}"
              >
              @error('take_profit_limit_3')
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

  @if ( session('success') )  
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">¡Cambios guardados exitosamente!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div style="margin: 0 auto;">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
          </div>
        </div>
      </div>
    </div>

  @endif

    

@endsection