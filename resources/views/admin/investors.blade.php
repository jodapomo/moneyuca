@extends('layout.app')

@section('extra-css')
  <link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('extra-js')
  <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable({
        "language": {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      }
      });
    });
  </script>
@endsection

{{-- Page title --}}
@section('title', "Inversionistas")

{{-- Page content --}}
@section('content')

  <!-- DataTales -->
  <div class="card shadow mb-4">
    <div class="card-body">
      @if ( $investors->isEmpty() )   
        <div class="alert alert-info" role="alert">
          No se encontraron inversionistas.
        </div> 
      @else
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id.</th>
                <th>Nombre</th>
                <th>Nombre de usuario</th>
                <th>Balance</th>
                <th>Margen Disponible</th>
                <th>Fecha Creación</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id.</th>
                <th>Nombre</th>
                <th>Nombre de usuario</th>
                <th>Balance</th>
                <th>Margen Disponible</th>
                <th>Fecha Creación</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($investors as $investor)
                <tr>
                  <td>{{ $investor->id }}</td>
                  <td>{{ $investor->name }}</td>
                  <td>{{ $investor->username }}</td>
                  <td>{{ $investor->resume->balance }}</td>
                  <td>{{ $investor->resume->margin_available }}</td>
                  <td>{{ $investor->created_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>

@endsection