@extends('layout.app')

@section('extra-css')
  <style>
    .buttons {
      display: flex;
      justify-content: space-evenly;
      flex-wrap: wrap;
    }

    .content {
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 1rem;
    }

    .content pre {
      margin-bottom: 0;
    }

    .date {
      margin-bottom: 0.5rem;
    }

    .signal-button {
      margin-bottom: 5px;
    }
  </style>
@endsection

@section('extra-js')
  {{-- Extra js scripts links here --}}
@endsection

{{-- Page title --}}
@section('title', "Señales No Interpretadas")

{{-- Page content --}}
@section('content')

  @if ( $signals->isEmpty() )   
    <div class="alert alert-info" role="alert">
      No se encontraron señales.
    </div> 
  @else
    <div class="row">
      @foreach ($signals as $signal)
        
          <div class="col-lg-4 col-md-6">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="date">
                    {{ $signal->created_at }}
                </div>
                <div class="content bg-gray-200">
                  <pre>{{ $signal->content }}</pre>
                </div>
                <div class="buttons">
                    <a href="#" class="btn btn-success btn-icon-split signal-button">
                      <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                      </span>
                      <span class="text">Operación</span>
                    </a>
      
                    <a href="#" class="btn btn-info btn-icon-split signal-button">
                      <span class="icon text-white-50">
                        <i class="fas fa-tools"></i>
                      </span>
                      <span class="text">Modificador</span>
                    </a>
                </div>
              </div>
            </div>
          </div>
        
      @endforeach
    </div>
  @endif

  
  

@endsection