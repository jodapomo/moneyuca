<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{ asset('img/logo.png  ') }}" />
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') - Moneyuca</title>

  <!-- Custom fonts of the template -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="{{ asset('css/fontawesome/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Styles of the template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Extra styles -->
  @yield('extra-css')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">