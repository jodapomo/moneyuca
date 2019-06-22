@extends('layout.app')

@section('extra-css')
  {{-- Extra css links here --}}
@endsection

@section('extra-js')
  {{-- Extra js scripts links here --}}
@endsection

{{-- Page title --}}
@if (Auth::user()->isRole('admin'))   

  @section('title', "Admin Home")

@elseif(Auth::user()->isRole('investor'))

  @section('title', "Investor Home")

@endif

{{-- Page content --}}
@section('content')
@endsection