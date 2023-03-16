<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>KELMAS - Lapor</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" 
    integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Libraries -->
    <style>
        .header .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url(../images/wave.png);
            background-size: 1000px 100px;
        }

        .header .wave1 {
            -webkit-animation: animate 30s linear infinite;
            animation: animate 30s linear infinite;
            z-index: 999;
            opacity: 1;
            -webkit-animation-delay: 0s;
            animation-delay: 0s;
            bottom: 0;
        }
    </style>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg" style="height: 80px;"></div>
            <nav class="navbar navbar-expand-lg main-navbar container mt-1">
                <a href="index.html" class="navbar-brand sidebar-gone-hide">KELMAS</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <ul class="navbar-nav navbar-right ml-auto">
                    @if(Auth::guard('masyarakat')->check())
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                    @else
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <div class="btn btn-outline-primary">
                                    <a class="nav-link" href="#">MASUK</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="btn btn-outline-light">
                                    <a class="nav-link" href="#">DAFTAR</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </ul>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header" style="display: block;">
                        <div class="text-center">
                            <h1 class="medium mt-3">LAYANAN PENGADUAN MASYARAKAT</h1>
                            <p class="mb-3">Sampaikan laporan Anda langsung kepada yang pemerintah berwenang</p>
                        </div>
    <div class="wave wave1"></div>

                    </div>

                    <div class="section-body">
                        <div class="card">
                            <div class="profile-widget">
                                <div class="profile-widget-description">
                                    <div class="container">
                                        @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                        @endif
            
                                        @if (Session::has('pengaduan'))
                                        <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                                        @endif
            
                                        <div class="card mb-3 shadow-sm">
                                            <div class="card-header">
                                                <h4>
                                                    Tulis Laporan Disini
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
            
                                                    <div class="form-group">
                                                        <div class="section-title">Judul Laporan</div>
                                                        <input type="text" value="{{ old('judul_laporan') }}" name="judul_laporan"
                                                            placeholder="Judul laporan" class="form-control">
                                                    </div>
            
                                                    <div class="form-group">
                                                        <div class="section-title">Isi Laporan</div>
                                                        <textarea name="isi_laporan" placeholder="Isi laporan" class="form-control"
                                                            rows="4">{{ old('isi_laporan') }}</textarea>
                                                    </div>
            
                                                    <div class="form-group">
                                                        <div class="section-title">Tanggal Kejadian</div>
                                                        <input type="text" value="{{ old('tgl_kejadian') }}" name="tgl_kejadian"
                                                            placeholder="Tanggal kejadian" id="tgl_kejadian" class="form-control"
                                                            onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                                                    </div>
            
                                                    <div class="form-group">
                                                        <div class="section-title">Lokasi Kejadian</div>
                                                        <textarea name="lokasi_kejadian" rows="3" class="form-control"
                                                            placeholder="Lokasi kejadian">{{ old('lokasi_kejadian') }}</textarea>
                                                    </div>
            
                                                    <div class="form-group">
                                                        <div class="section-title">Kategori Kejadian</div>
                                                        <div class="input-group mb-3">
                                                            <select name="id_kategori" class="custom-select" id="inputGroupSelect01"
                                                                required>
                                                                <option value="" selected>Kategori kejadian</option>
                                                                @foreach ($kategori as $k)
                                                                <option value="{{$k->id_kategori}}">{{ ($k->nama) ? $k->nama : '-' }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
            
                                                    <div class="section-title">Pilih Foto</div>
                                                    <div class="custom-file">
                                                        <input name="foto" type="file" class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Pilih foto</label>
                                                    </div>
            
                                                    <center>
                                                        <button type="submit" class="btn btn-primary mt-4" style="width: 80%;">Kirim</button>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </section>
            </div>
        </div>

        <div class="card" style="background-color: #6777ef; width: 100%;">
            <div class="m-5">
                <div class="text-center">
                    <h2 class="text-white mt-3">Jumlah Laporan</h2>
                    <h2 class="text-white">{{ $pengaduan }}</h2>
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="text-center">
                Copyright &copy; 2023 <div class="bullet"></div> By Adrian</a>
            </div>
            <div class="footer-right">
                
            </div>
        </footer>
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

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>