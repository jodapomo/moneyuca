@extends('layout.app')

@section('extra-css')
  <style>

    .signal {
      border: 2px solid #b7b9cc;
      border-radius: 10px;
      padding: 10px;
      margin: 10px 0px 20px 0px;
    }


    .content pre {
      margin-bottom: 0;
    }

    .signal .content {
      border-radius: 10px;
      padding: 10px;
    }

    .signal-info {
      padding-left: 0;
    }

    .modifier-types-buttons {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-evenly;
      margin-bottom: 40px;
    }

    .type-button {
      display: flex;
      flex-flow: column;
      min-width: 210px;
      width: 20%;
      margin: 10px;
      transition: all 200ms ease-in-out;
    }
    
    .type-button:hover {
      box-shadow: 0 .15rem 0.75rem 0 rgba(37, 38, 44, 0.24)!important
    }

    .type-button .icon {
      padding: 0!important;
    }

    .operation {
      border: 2px solid #b7b9cc;
      border-radius: 10px;
      padding: 10px;
      display: flex;
      flex-wrap: wrap;
      cursor: pointer;
    }

    .operation .type-pair {
      padding-left: 10px;
      padding-right: 10px;
      text-align: center;
      border-right: 1px solid #b7b9cc;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .operation .type-pair .type {
      font-weight: bold;
      font-size: 25px;
      color: #1cc88a;
    }

    .operation-data .data-box {
      display: flex;
      flex-direction: column;
      border: 2px solid #b7b9cc;
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      margin-right: 10px;
    }

    .operation-signal {
      padding-left: 10px;
      padding-right: 10px;
      border-left: 1px solid #b7b9cc;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .operation .operation-data {
      display: flex;
      flex-wrap: wrap;
      padding-left: 10px;
    }

    .custom-control-label {
      margin-bottom: 20px;
    }

    .custom-radio input[type="radio"]:checked+label .operation {
      border: 2px solid #4e73df;
    }
  </style>
@endsection

@section('extra-js')
  {{-- Extra js scripts links here --}}
@endsection

{{-- Page title --}}
@section('title', "Crear Modificador")

{{-- Page content --}}
@section('content')

  <div class="modifier-types-buttons">

    @if (isset($signal))
    <a href="{{route('investor.createModifier.showForm', ['type' => 'breakEven', 'signal' => $signal->id])}}" class="btn btn-secondary shadow btn-icon-split btn-lg type-button">
    @else
    <a href="{{route('investor.createModifier.showForm', ['type' => 'breakEven'])}}" class="btn btn-secondary shadow btn-icon-split btn-lg type-button">
    @endif
      <span class="icon text-white-50">
        <i class="fas fa-balance-scale"></i>
      </span>
      <span class="text">Break Even</span>
    </a>

    @if (isset($signal))
    <a href="{{route('investor.createModifier.showForm', ['type' => 'closeAll', 'signal' => $signal->id])}}" class="btn btn-secondary shadow btn-icon-split btn-lg type-button">
    @else
    <a href="{{route('investor.createModifier.showForm', ['type' => 'closeAll'])}}" class="btn btn-secondary shadow btn-icon-split btn-lg type-button">
    @endif
      <span class="icon text-white-50">
        <i class="fas fa-skull-crossbones"></i>
      </span>
      <span class="text">Cerrar Todas</span>
    </a>

    @if (isset($signal))
    <a href="{{route('investor.createModifier.showForm', ['type' => 'cancel', 'signal' => $signal->id])}}" class="btn btn-secondary shadow btn-icon-split btn-lg type-button">
    @else
    <a href="{{route('investor.createModifier.showForm', ['type' => 'cancel'])}}" class="btn btn-secondary shadow btn-icon-split btn-lg type-button">
    @endif
      <span class="icon text-white-50">
        <i class="far fa-window-close"></i>
      </span>
      <span class="text">Cancelar Operación</span>
    </a>

    @if (isset($signal))
    <a href="{{route('investor.createModifier.showForm', ['type' => 'moveStopLoss', 'signal' => $signal->id])}}" class="btn btn-secondary shadow btn-icon-split btn-lg type-button">
    @else
    <a href="{{route('investor.createModifier.showForm', ['type' => 'moveStopLoss'])}}" class="btn btn-secondary shadow btn-icon-split btn-lg type-button">
    @endif
      <span class="icon text-white-50">
        <i class="fas fa-sliders-h"></i>
      </span>
      <span class="text">Mover Stop Loss</span>
    </a>
  </div>

  @if (isset($signal))
    <h5>Señal</h5>
    <div class="signal row">
      <div class="col-md-6 signal-info">
        <div class="date">
          <span style="font-weight:bold">Fecha:</span>
          <span>{{ $signal->created_at }}</span>
        </div>
        <div>
          <span style="font-weight:bold">Referencia Mensaje:</span>
          <span>{{ $signal->message_reference }}</span>
        </div>
        <div>
          <span style="font-weight:bold">Referencia Canal:</span>
          <span>{{ $signal->channel_reference }}</span>
        </div>
        <div>
          <span style="font-weight:bold">Id Mensaje:</span>
          <span>{{ $signal->message_id }}</span>
        </div>
      </div>
      <div class="col-md-6 content bg-gray-200">
          <pre>{{ $signal->content }}</pre>
      </div>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
        <h6>Por favor corregir los siguientes errores:</h6>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  @if(session('breakEven'))
    <h4>Break Even</h4>
    <hr>
    @if (isset($signal))
    <form method="POST" action="{{ route('investor.createModifier.storeBreakEven', $signal->id) }}">
    @else
    <form method="POST" action="{{ route('investor.createModifier.storeBreakEven') }}">
    @endif
    @csrf
      @if ( ($operations = session('operations')) && session('operations')->isNotEmpty())
        <h5>Operacions Abiertas:</h5>
        @error('operation')
          <div  class="invalid-feedback" style="display:block" role="alert">
              {{ $message }}
          </div >
        @enderror
        @foreach($operations as $operation)
          <div class="custom-control custom-radio">
            <input type="radio" id="radio-{{$operation->id}}" name="operation_reference" value="{{ $operation->id }}" class="custom-control-input">
            <label class="custom-control-label" for="radio-{{$operation->id}}">
              <div class="operation">
                <div class="type-pair">
                  <div class="type">{{$operation->type}}</div>
                  <div class="currency-pair">{{$operation->currency_pair}}</div>  
                </div>
                <div class="operation-data">
                  <div class="data-box">
                    <span style="font-weight:bold">Precio</span>
                    <span>{{ $operation->price }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">Stop Loss</span>
                    <span>{{ $operation->stop_loss }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 1</span>
                    <span>{{ $operation->take_profit_1 }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 2</span>
                    <span>{{ $operation->take_profit_2 }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 3</span>
                    <span>{{ $operation->take_profit_3 }}</span>
                  </div>
                </div>
                @if ( $operation->signal )
                <div class="operation-signal">
                  <div>
                    <span style="font-weight:bold">Id Mensaje:</span>
                    <span>{{ $operation->signal->message_id }}</span>
                  </div>
                  <div>
                    <span style="font-weight:bold">Referencia Mensaje:</span>
                    <span>{{ $operation->signal->message_reference }}</span>
                  </div>
                  <div>
                    <span style="font-weight:bold">Referencia Canal:</span>
                    <span>{{ $operation->signal->channel_reference }}</span>
                  </div>
                </div>
                @endif
              </div>
            </label>
          </div>
        @endforeach
        <div style="text-align:center">
            <button type="submit" class="btn btn-primary" style="width:30%; margin-bottom: 20px;">Crear</button>
        </div>
      @else
        <div class="alert alert-info" role="alert">
            No se encontraron operaciones abiertas para modificar.
        </div>
      @endif

    </form>
  @endif

  @if(session('closeAll'))
    <h4>Cerrar Todas</h4>
    <hr>
    @if (isset($signal))
    <form method="POST" action="{{ route('investor.createModifier.storeCloseAll', $signal->id) }}">
    @else
    <form method="POST" action="{{ route('investor.createModifier.storeCloseAll') }}">
    @endif
    @csrf
      <div class="form-group col-md-4">
        <label for="inputPassword4">Par Moneda</label>
        <input type="text" class="form-control" name="currency_pair" placeholder="e.g EURUSD" value="{{ old('currency_pair') }}">
        @error('currency_pair')
          <div  class="invalid-feedback" style="display:block" role="alert">
              {{ $message }}
          </div >
        @enderror
      </div>
      <div style="text-align:center">
          <button type="submit" class="btn btn-primary" style="width:30%; margin-bottom: 20px;">Crear</button>
      </div>
    </form>
  @endif

  @if(session('cancel'))
    <h4>Cancelar Operación</h4>
    <hr>
    @if (isset($signal))
    <form method="POST" action="{{ route('investor.createModifier.storeCancel', $signal->id) }}">
    @else
    <form method="POST" action="{{ route('investor.createModifier.storeCancel') }}">
    @endif
    @csrf
      @if ( ($operations = session('operations')) && session('operations')->isNotEmpty())
        <h5>Operacions Abiertas:</h5>
        @error('operation')
          <div  class="invalid-feedback" style="display:block" role="alert">
              {{ $message }}
          </div >
        @enderror
        @foreach($operations as $operation)
          <div class="custom-control custom-radio">
            <input type="radio" id="radio-{{$operation->id}}" name="operation_reference" value="{{ $operation->id }}" class="custom-control-input">
            <label class="custom-control-label" for="radio-{{$operation->id}}">
              <div class="operation">
                <div class="type-pair">
                  <div class="type">{{$operation->type}}</div>
                  <div class="currency-pair">{{$operation->currency_pair}}</div>  
                </div>
                <div class="operation-data">
                  <div class="data-box">
                    <span style="font-weight:bold">Precio</span>
                    <span>{{ $operation->price }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">Stop Loss</span>
                    <span>{{ $operation->stop_loss }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 1</span>
                    <span>{{ $operation->take_profit_1 }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 2</span>
                    <span>{{ $operation->take_profit_2 }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 3</span>
                    <span>{{ $operation->take_profit_3 }}</span>
                  </div>
                </div>
                @if ( $operation->signal )
                <div class="operation-signal">
                  <div>
                    <span style="font-weight:bold">Id Mensaje:</span>
                    <span>{{ $operation->signal->message_id }}</span>
                  </div>
                  <div>
                    <span style="font-weight:bold">Referencia Mensaje:</span>
                    <span>{{ $operation->signal->message_reference }}</span>
                  </div>
                  <div>
                    <span style="font-weight:bold">Referencia Canal:</span>
                    <span>{{ $operation->signal->channel_reference }}</span>
                  </div>
                </div>
                @endif
              </div>
            </label>
          </div>
        @endforeach
        <div style="text-align:center">
            <button type="submit" class="btn btn-primary" style="width:30%; margin-bottom: 20px;">Crear</button>
        </div>
      @else
        <div class="alert alert-info" role="alert">
            No se encontraron operaciones abiertas para modificar.
        </div>
      @endif
    </form>
  @endif

  @if(session('moveStopLoss'))
    <h4>Mover Stop Loss</h4>
    <hr>
    @if (isset($signal))
    <form method="POST" action="{{ route('investor.createModifier.storeMoveStopLoss', $signal->id) }}">
    @else
    <form method="POST" action="{{ route('investor.createModifier.storeMoveStopLoss') }}">
    @endif
    @csrf
      @if ( ($operations = session('operations')) && session('operations')->isNotEmpty())
        <div class="form-group col-md-4">
          <label for="inputPassword4">Precio</label>
          <input type="number" class="form-control" name="price" min="0" step="any" value="{{ old('price') }}">
          @error('price')
            <div  class="invalid-feedback" style="display:block" role="alert">
                {{ $message }}
            </div >
          @enderror
        </div>
        <h5>Operacions Abiertas:</h5>
        @error('operation')
          <div  class="invalid-feedback" style="display:block" role="alert">
              {{ $message }}
          </div >
        @enderror
        @foreach($operations as $operation)
          <div class="custom-control custom-radio">
            <input type="radio" id="radio-{{$operation->id}}" name="operation_reference" value="{{ $operation->id }}" class="custom-control-input">
            <label class="custom-control-label" for="radio-{{$operation->id}}">
              <div class="operation">
                <div class="type-pair">
                  <div class="type">{{$operation->type}}</div>
                  <div class="currency-pair">{{$operation->currency_pair}}</div>  
                </div>
                <div class="operation-data">
                  <div class="data-box">
                    <span style="font-weight:bold">Precio</span>
                    <span>{{ $operation->price }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">Stop Loss</span>
                    <span>{{ $operation->stop_loss }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 1</span>
                    <span>{{ $operation->take_profit_1 }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 2</span>
                    <span>{{ $operation->take_profit_2 }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 3</span>
                    <span>{{ $operation->take_profit_3 }}</span>
                  </div>
                </div>
                @if ( $operation->signal )
                <div class="operation-signal">
                  <div>
                    <span style="font-weight:bold">Id Mensaje:</span>
                    <span>{{ $operation->signal->message_id }}</span>
                  </div>
                  <div>
                    <span style="font-weight:bold">Referencia Mensaje:</span>
                    <span>{{ $operation->signal->message_reference }}</span>
                  </div>
                  <div>
                    <span style="font-weight:bold">Referencia Canal:</span>
                    <span>{{ $operation->signal->channel_reference }}</span>
                  </div>
                </div>
                @endif
              </div>
            </label>
          </div>
        @endforeach
        <div style="text-align:center">
            <button type="submit" class="btn btn-primary" style="width:30%; margin-bottom: 20px;">Crear</button>
        </div>
      @else
        <div class="alert alert-info" role="alert">
            No se encontraron operaciones abiertas para modificar.
        </div>
      @endif
    </form>
  @endif



@endsection