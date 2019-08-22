@extends('layout.app')

@section('extra-css')
  <style>
    .type-pair {
      display: flex;
      border-bottom: 1px solid #b7b9cc;
      padding-left: 10px;
      padding-right: 10px;
      justify-content: space-between;
      align-items: flex-end;
    }

    .type-pair .type {
      font-weight: bold;
      font-size: 30px;
      color: #1cc88a;
    }

    .currency-pair {
      font-size: 20px;
    }

    
    .operation-data .data-box {
      display: flex;
      flex-direction: column;
      border: 2px solid #b7b9cc;
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      margin-right: 10px;
      margin-bottom: 10px;
      min-width: 86px;
    }

    .operation-data {
      display: flex;
      flex-wrap: wrap;
      padding: 10px;
      padding-right: 0;
      justify-content: center;
    }

    .operation-dates {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      padding: 10px;
      padding-top: 0;
      padding-bottom: 0;
    }

    .operation-signal {
      padding: 10px;
    }

    .signal-content {
      border-radius: 10px;
      padding: 10px;
    }

    .signal-content pre {
      margin-bottom: 0;
    }

    .signal-data {
      margin-bottom: 10px;
    }

  </style>
@endsection

@section('extra-js')
  {{-- Extra js scripts links here --}}
@endsection

{{-- Page title --}}
@section('title', "Operaciones Abiertas")

{{-- Page content --}}
@section('content')
  @if ($message = session('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong> {{ $message }} </strong>
    </div>
  @endif

  @if ($message = session('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong> {{ $message }} </strong>
    </div>
  @endif

  @if ( $operations->isEmpty() )   
    <div class="alert alert-info" role="alert">
      No se encontraron operaciones abiertas.
    </div> 
  @else
    <div class="row">
      @foreach ($operations as $operation)
        
          <div class="col-md-12 col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-body">
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
                    <span style="font-weight:bold">Unidades</span>
                    <span>{{ $operation->units }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">Stop Loss</span>
                    <span>{{ $operation->stop_loss }}</span>
                  </div>
                  <div class="data-box">
                    <span style="font-weight:bold">TP 1</span>
                    <span>{{ $operation->take_profit_1 }}</span>
                  </div>
                  @isset($operation->take_profit_2)
                    <div class="data-box">
                      <span style="font-weight:bold">TP 2</span>
                      <span>{{ $operation->take_profit_2 }}</span>
                    </div>
                  @endisset
                  @isset($operation->take_profit_3)
                    <div class="data-box">
                      <span style="font-weight:bold">TP 3</span>
                      <span>{{ $operation->take_profit_3 }}</span>
                    </div>
                  @endisset
                </div>
                <div class="operation-dates">
                  <div>
                    <span style="font-weight:bold">Creación:</span>
                    <span>{{ $operation->created_at }}</span>
                  </div>
                  <div>
                    <span style="font-weight:bold">Última actualización:</span>
                    <span>{{ $operation->updated_at }}</span>
                  </div>
                </div>
                @if ( $operation->signal )
                <div class="operation-signal">
                  <div class="signal-data">
                    <h5 style="font-weight:bold">Señal</h5>
                    <div>
                      <span style="font-weight:bold">Creación:</span>
                      <span>{{ $operation->signal->created_at }}</span>
                    </div>
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
                  <div class="signal-content bg-gray-200">
                    <pre>{{ $operation->signal->content }}</pre>
                  </div>

                </div>
                @endif
              </div>
            </div>
          </div>
        
      @endforeach
    </div>
  @endif
@endsection
