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
  </style>
@endsection

@section('extra-js')
  {{-- Extra js scripts links here --}}
@endsection

{{-- Page title --}}
@section('title', "Crear Operación")

{{-- Page content --}}
@section('content')
  <div class="form">
      @if (isset($signal))
      <form method="POST" action="{{ route('investor.createOperation.store', $signal->id) }}">
      @else
      <form method="POST" action="{{ route('investor.createOperation.store') }}">
      @endif
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputState">Tipo</label>
          <select name="type" class="form-control" value="{{ old('type') }}">
            <option>BUY</option>
            <option>SELL</option>
            <option>BUY STOP</option>
            <option>SELL STOP</option>
            <option>BUY LIMIT</option>
            <option>SELL LIMIT</option>
          </select>
          @error('type')
            <div  class="invalid-feedback" style="display:block" role="alert">
                {{ $message }}
            </div >
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Par Moneda</label>
          <input type="text" class="form-control" name="currency_pair" placeholder="e.g EURUSD" value="{{ old('currency_pair') }}">
          @error('currency_pair')
            <div  class="invalid-feedback" style="display:block" role="alert">
                {{ $message }}
            </div >
          @enderror
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputPassword4">Precio</label>
          <input type="number" class="form-control" name="price" min="0" step="any" value="{{ old('price') }}">
          @error('price')
            <div  class="invalid-feedback" style="display:block" role="alert">
                {{ $message }}
            </div >
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Stop Loss (SL)</label>
          <input type="number" class="form-control" name="stop_loss" min="0" step="any" value="{{ old('stop_loss') }}">
          @error('stop_loss')
            <div  class="invalid-feedback" style="display:block" role="alert">
                {{ $message }}
            </div >
          @enderror
        </div>
      </div>

      <h5>Precios Tomar Ganancias (TP)</h5>
      <div class="form-row">
        
        <div class="form-group col-md-4">
          <label for="inputPassword4">TP 1</label>
          <input type="number" class="form-control" name="take_profit_1" min="0" step="any" value="{{ old('take_profit_1') }}">
          @error('take_profit_1')
            <div  class="invalid-feedback" style="display:block" role="alert">
                {{ $message }}
            </div >
          @enderror
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">TP 2</label>
          <input type="number" class="form-control" name="take_profit_2" min="0" step="any" value="{{ old('take_profit_2') }}">
          @error('take_profit_2')
            <div  class="invalid-feedback" style="display:block" role="alert">
                {{ $message }}
            </div >
          @enderror
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">TP 3</label>
          <input type="number" class="form-control" name="take_profit_3" min="0" step="any" value="{{ old('take_profit_3') }}">
          @error('take_profit_3')
            <div  class="invalid-feedback" style="display:block" role="alert">
                {{ $message }}
            </div >
          @enderror
        </div>
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

      <div style="text-align:center">
          <button type="submit" class="btn btn-primary" style="width:30%; margin-bottom: 20px;">Crear</button>
      </div>
    </form>
  </div>



@endsection
