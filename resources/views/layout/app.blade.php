@include('layout.header')

@include('layout.sidebar')

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('layout.topbar')

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

            @yield('content')
      
        </div>
        
    </div>
    <!-- End of Main Content -->

    @include('layout.footer')