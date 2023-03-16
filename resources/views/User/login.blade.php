<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KELMAS - Login</title>
    <!-- General CSS Files -->
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- General CSS -->
    <style>
            /*
        *
        * ==========================================
        * CUSTOM UTIL CLASSES
        * ==========================================
        *
        */
    
        .border-md {
            border-width: 2px;
        }
    
        .btn-facebook {
            background: #405D9D;
            border: none;
        }
    
        .btn-facebook:hover, .btn-facebook:focus {
            background: #314879;
        }
    
        .btn-twitter {
            background: #42AEEC;
            border: none;
        }
    
        .btn-twitter:hover, .btn-twitter:focus {
            background: #1799e4;
        }
    
    
    
        /*
        *
        * ==========================================
        * FOR DEMO PURPOSES
        * ==========================================
        *
        */
    
        body {
            min-height: 100vh;
            font-size: 14px;
            font-weight: 400;
            font-family: "Nunito", "Segoe UI", arial;
            /* color: #6c757d; */
        }
    
        .form-control:not(select) {
            padding: 1.5rem 0.5rem;
        }
    
        select.form-control {
            height: 52px;
            padding-left: 0.5rem;
        }
    
        .form-control::placeholder {
            color: #ccc;
            font-weight: bold;
            font-size: 0.9rem;
        }
        .form-control:focus {
            box-shadow: none;
        }

        h2 {
            font-weight: bold;
            font-family: "Nunito", "Segoe UI", arial;
        }
    </style>
    
</head>
<body>

    <!-- Navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light py-4">
            <div class="container">
                <!-- Navbar Brand -->
                <a href="{{ route('pekat.lapor') }}" class="navbar-brand">
                    <h2>KELMAS</h2>
                </a>
            </div>
        </nav>
    </header>


    <div class="container">
        <div class="row py-3 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 ml-auto mb-md-0 pt-4">
                <img src="{{ asset('images/user-login.svg') }}" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Masuk Akun Anda</h1>
                <p class="font-italic text-muted mb-0">Masuk ke akun Keluhan Masyarakat Anda disni.</p>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-5 mr-auto col-lg-6">
                <form action="{{ route('pekat.login') }}" method="POST">
                @csrf
                    <div class="row">

                        <!-- Username -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="username" type="text" value="{{ old('username') }}" name="username" placeholder="Username atau Email" class="form-control bg-white border-left-0 border-md @error('username') is-invalid @enderror">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ 'pesan_email' }}
                            </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ 'pesan_password' }}
                            </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <button type="submit" class="btn btn-primary btn-block py-2">
                                <span class="font-weight-bold">Masuk Akun</span>
                            </button>
                            {{-- <a href="{{ route('pekat.lapor') }}" class="btn btn-warning text-white btn-block py-2">
                                <span class="font-weight-bold">Kembali Ke Halaman Depan</span>
                            </a> --}}
                        </div>

                    </div>
                </form>
                @if (Session::has('pesan'))
                    <div class="alert alert-danger my-2">
                        {{ Session::get('pesan') }}
                    </div>
                @endif
                @if (Session::has('pesan_daftar'))
                    <div class="alert alert-success my-2">
                        {{ Session::get('pesan_daftar') }}
                    </div>
                @endif
                @if (Session::has('pesan_logout'))
                    <div class="alert alert-danger mb-2">
                        {{ Session::get('pesan_logout') }}
                    </div>
                @endif
                <!-- Already Registered -->
                <div class="row text-center mt-3">
                    <div class="col-lg-6 col-12">
                        <p class="text-muted font-weight-bold float-left"><a href="{{ route('pekat.lapor') }}" class="text-secondary">← Kembali</a></p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <p class="text-muted font-weight-bold float-right"><a href="/password/reset" class="text-primary">Lupa password Anda?</a></p>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/jquery-3.1.1.slim.min.js') }}"></script>
    <script>
        // For Demo Purpose [Changing input group text on focus]
        $(function () {
            $('input, select').on('focus', function () {
                $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
            });
            $('input, select').on('blur', function () {
                $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
            });
        });
    </script>
</body>
</html>