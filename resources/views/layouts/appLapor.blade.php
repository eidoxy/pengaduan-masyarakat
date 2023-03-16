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
</head>

<body>
    <div id="app">

        @if (Auth::guard('masyarakat')->check() && Auth::guard('masyarakat')->user()->email_verified_at == null)
        <div class="row">
            <div class="col">
                <div class="notification">
                    Konfirmasi email <span class="font-weight-bold">{{ Auth::guard('masyarakat')->user()->email }}</span>
                    untuk melindungi akun Anda.
                    <form action="{{ route('pekat.sendVerification') }}" method="POST" style="display: inline-block">
                        @csrf
                        <button type="submit" class="btn btn-white">Verifikasi Sekarang</button>
                    </form>
                    <!-- <a href="https://www.youtube.com/watch?v=KOaeDHeJ80I&ab_channel=Trplea" class="btn btn-white">Verifikasi Sekarang</a> -->
                </div>
            </div>
        </div>
        @endif

        <div class="main-wrapper main-wrapper-1">
            {{-- Navbar --}}
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            {{-- <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> --}}
                            @if(Auth::guard('masyarakat')->check())
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('masyarakat')->user()->nama}}</div>
                            @else
                            <ul class="navbar-nav text-center ml-auto">
                                <li class="nav-item">
                                    <a href="{{ route('pekat.formLogin') }}" class="btn text-white">Masuk</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('pekat.formRegister') }}" class="btn btn-outline-purple">Daftar</a>
                                </li>
                            </ul>
                            @endauth

                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if(Auth::guard('masyarakat')->check())
                            <a href="/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            @endif
                        </div>
                    </li>
                </ul>
            </nav>

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