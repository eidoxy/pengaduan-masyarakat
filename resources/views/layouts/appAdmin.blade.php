<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" 
    integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"> --}}

    <!-- CSS Libraries -->
    @yield('css')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    {{-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script> --}}

    <!-- /END GA -->

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- Navbar --}}
            @include('layouts.navbar')

            {{-- Sidebar --}}
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>

            {{-- Footer --}}
            @include('layouts.footer')

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/iziToast.min.js') }}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- JS Libraies -->
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}

    <!-- Page Specific JS File -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

    @yield('js')

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>