<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
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
            <div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">KELMAS</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">KM</a>
                    </div>
                    <ul class="sidebar-menu">
                        @if (Auth::guard('masyarakat')->check())
                        <li class="menu-header">Menu</li>
                        <li class="{{ request()->is('laporan') ? 'active' : '' }}">
                            <a class="nav-link" href="/laporan"><i class="fas fa-clipboard-list"></i><span>Laporan</span></a>
                        </li>
                        <li class="{{ request()->is('profile') ? 'active' : '' }}">
                            <a class="nav-link" href="/profile"><i class="fas fa-user"></i><span>Profile</span></a>
                        </li>
                        @endif
                    </ul>
                </aside>
            </div>

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
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

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