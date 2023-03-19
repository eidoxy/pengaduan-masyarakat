<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KELMAS - Daftar</title>
    <!-- General CSS Files -->
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
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
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Buat Akun Anda</h1>
                <p class="font-italic text-muted mb-0">Buat akun Keluhan Masyarakat Anda disni.</p>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                @if (Session::has('pesan'))
                    <div class="alert alert-danger my-2">
                        {{ Session::get('pesan') }}
                    </div>
                @endif
                <form action="{{ route('pekat.register') }}" method="POST">
                @csrf
                    <div class="row">

                        <!-- NIK -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-hashtag text-muted"></i>
                                </span>
                            </div>
                            <input id="nik" type="text" value="{{ old('nik') }}" name="nik" placeholder="NIK" class="form-control bg-white border-left-0 border-md  @error('nik') is-invalid @enderror" maxlength="16" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Nama -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="nama" type="text" value="{{ old('nama') }}" name="nama" placeholder="Nama" class="form-control bg-white border-left-0 border-md @error('nama') is-invalid @enderror" required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="email" value="{{ old('email') }}" name="email" placeholder="Email" class="form-control bg-white border-left-0 border-md @error('email') is-invalid @enderror" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-book text-muted"></i>
                                </span>
                            </div>
                            <input id="username" type="text" value="{{ old('username') }}" name="username" placeholder="Username" class="form-control bg-white border-left-0 border-md @error('username') is-invalid @enderror" required>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Telp -->
                        <div class="input-group col-lg-12 mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone-square text-muted"></i>
                                </span>
                            </div>
                            <input id="telp" type="text" value="{{ old('telp') }}" name="telp" placeholder="No. Telp" class="form-control bg-white border-md border-left-0 pl-3 @error('telp') is-invalid @enderror" maxlength="13" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                            @error('telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>.

                        <!-- Password -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md @error('password') is-invalid @enderror" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Captcha -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="border-right-0 border-md @error('g-recaptcha-response') is-invalid @enderror"> {!! htmlFormSnippet() !!} </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <button type="submit" class="btn btn-primary btn-block py-2">
                                <span class="font-weight-bold">Daftar Akun</span>
                            </button>
                        </div>

                        <!-- Divider Text -->
                        {{-- <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div> --}}

                        <!-- Social Login -->
                        {{-- <div class="form-group col-lg-12 mx-auto">
                            <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                                <i class="fa fa-facebook-f mr-2"></i>
                                <span class="font-weight-bold">Continue with Facebook</span>
                            </a>
                            <a href="#" class="btn btn-primary btn-block py-2 btn-twitter">
                                <i class="fa fa-twitter mr-2"></i>
                                <span class="font-weight-bold">Continue with Twitter</span>
                            </a>
                        </div> --}}

                        <!-- Already Registered -->
                        <div class="text-center w-100 mt-3">
                            <p class="text-muted font-weight-bold">Sudah Ada Akun? <a href="{{ route('pekat.formLogin') }}" class="text-primary ml-2">Login Disini</a></p>
                        </div>

                    </div>
                </form>
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

        var input = document.querySelector('input[name="nik"]');
        input.addEventListener('input', function() {
        if (this.value.length > 16) {
            this.value = this.value.slice(0, 16);
        }
        });
    </script>
</body>
</html>