<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>KELMAS - Lapor</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" 
    integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Libraries -->
    <style>
        .notification {
            padding: 14px;
            text-align: center;
            background: #f4b704;
            color: #fff;
            font-weight: 300;
        }
    </style>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    
</head>

<body class="layout-3">

    {{-- Verifikasi Email --}}
    @if (Auth::guard('masyarakat')->check() && Auth::guard('masyarakat')->user()->email_verified_at == null)
        <div class="notification">Konfirmasi email <span class="font-weight-bold">{{ Auth::guard('masyarakat')->user()->email }}</span> untuk melindungi akun Anda.
            <form action="{{ route('pekat.sendVerification') }}" method="POST" style="display: inline-block">
                @csrf
                <button type="submit" class="btn btn-white">Verifikasi Sekarang</button>
            </form>
            <!-- <a href="https://www.youtube.com/watch?v=KOaeDHeJ80I&ab_channel=Trplea" class="btn btn-white">Verifikasi Sekarang</a> -->
        </div>
    @endif
    {{-- End Verifikasi Email --}}

    {{-- Content --}}
    <div id="app">
        <div class="main-wrapper container" style="width: 55rem;">
            <div class="navbar-bg" style="height: 400px;"></div>
            <div class="images navbar-bg2" style="width: 100%; margin-top: 360px;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#6777ef" fill-opacity="1" d="M0,96L30,85.3C60,75,120,53,180,58.7C240,64,300,96,360,96C420,96,480,64,540,53.3C600,43,660,53,720,64C780,75,840,85,900,106.7C960,128,1020,160,1080,170.7C1140,181,1200,171,1260,149.3C1320,128,1380,96,1410,80L1440,64L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>
            </div>
            <div class="images navbar-bg2" style="width: 100%; margin-top: 400px;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#6777ef" fill-opacity="0.6" d="M0,128L30,138.7C60,149,120,171,180,181.3C240,192,300,192,360,192C420,192,480,192,540,213.3C600,235,660,277,720,266.7C780,256,840,192,900,160C960,128,1020,128,1080,149.3C1140,171,1200,213,1260,202.7C1320,192,1380,128,1410,96L1440,64L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>
            </div>
            <div class="images navbar-bg2" style="width: 100%; margin-top: 440px;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#6777ef" fill-opacity="0.2" d="M0,256L30,245.3C60,235,120,213,180,218.7C240,224,300,256,360,245.3C420,235,480,181,540,170.7C600,160,660,192,720,202.7C780,213,840,203,900,170.7C960,139,1020,85,1080,53.3C1140,21,1200,11,1260,32C1320,53,1380,107,1410,133.3L1440,160L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>
            </div>

            {{-- Navbar --}}
            <nav class="navbar navbar-expand-lg main-navbar container mt-1">
                <a href="/" class="navbar-brand sidebar-gone-hide">KELMAS</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <ul class="navbar-nav navbar-right ml-auto">

                    @if(Auth::guard('masyarakat')->check())
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('foto/' . Auth::guard('masyarakat')->user()->foto) }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('masyarakat')->user()->nama }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('pekat.laporan') }}" class="dropdown-item has-icon">
                                <i class="fas fa-clipboard-list"></i> Laporan Saya
                            </a>
                            <a href="{{ route('profil.index') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('pekat.logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>

                    @else
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <div class="btn btn-outline-primary">
                                    <a class="nav-link" href="{{ route('pekat.formLogin') }}">MASUK</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="btn btn-outline-light">
                                    <a class="nav-link" href="{{ route('pekat.formRegister') }}">DAFTAR</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endauth

                </ul>
            </nav>
            {{-- End Navbar --}}

            {{-- Main Content --}}
            <div class="main-content">
                <section class="section mb-5">
                    <div class="section-header shadow" style="display: block;">
                        <div class="text-center">
                            <h1 class="medium mt-3">LAYANAN PENGADUAN MASYARAKAT</h1>
                            <p class="mb-3">Sampaikan laporan Anda langsung kepada yang pemerintah berwenang</p>
                        </div>
                    </div>

                    <div class="section-body shadow">
                        <div class="card">
                            <div class="profile-widget">
                                <div class="profile-widget-description">
                                    <div class="container">

                                        {{-- Alert --}}
                                        @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                        @endif

                                        @if (Session::has('pengaduan'))
                                        <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                                        @endif

                                        {{-- End Alert --}}

                                        {{-- Laporan --}}
                                        <div class="card mb-3 shadow-sm">
                                            <div class="card-header">
                                                <h4>
                                                    Tulis Laporan Disini
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <form class="form" action="{{ route('pekat.storeLapor') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
            
                                                    <div class="form-group">
                                                        <div class="section-title">Judul Laporan</div>
                                                        <input type="text" value="{{ old('judul_laporan') }}" name="judul_laporan"
                                                            placeholder="Judul laporan" class="form-control" required>
                                                    </div>
            
                                                    <div class="form-group">
                                                        <div class="section-title">Isi Laporan</div>
                                                        <textarea name="isi_laporan" placeholder="Isi laporan" class="form-control"
                                                            rows="4" required>{{ old('isi_laporan') }}</textarea>
                                                    </div>
            
                                                    <div class="form-group">
                                                        <div class="section-title">Tanggal Kejadian</div>
                                                        <input type="text" value="{{ old('tgl_kejadian') }}" name="tgl_kejadian"
                                                            placeholder="Tanggal kejadian" id="tgl_kejadian" class="form-control"
                                                            onfocusin="(this.type='date')" onfocusout="(this.type='text')" required>
                                                    </div>
            
                                                    <div class="form-group">
                                                        <div class="section-title">Lokasi Kejadian</div>
                                                        <textarea name="lokasi_kejadian" rows="3" class="form-control"
                                                            placeholder="Lokasi kejadian" required>{{ old('lokasi_kejadian') }}</textarea>
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
                                        {{-- End Laporan --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            {{-- End Main Content --}}
        </div>

        <hr>

        {{-- Counts Laporan --}}
        <div class="card mt-4" style="background-color: #6777ef; width: 100%;">
            <div class="m-5">
                <div class="text-center">
                    <h2 class="text-white mt-3">Jumlah Laporan</h2>
                    <h2 class="text-white">{{ $pengaduan }}</h2>
                </div>
            </div>
        </div>
        {{-- End Counts Laporan --}}

        <hr>

        {{-- Footer --}}
        <footer class="main-footer">
            <div class="text-center">
                Copyright &copy; 2023 <div class="bullet"></div> By Adrian</a>
            </div>
            <div class="footer-right">
                
            </div>
        </footer>
        {{-- End Footer --}}

    </div>
    {{-- End Content --}}

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/js/iziToast.min.js') }}" type="text/javascript"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    
    <!-- JS Tambahan -->
    <script>
        // Membuat fungsi tanggal
        $(function(){
            var dtToday = new Date();
    
            var month = dtToday.getMonth() - 1; // pakai (+ 2) agar bisa memilih tanggal sekarang.
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
    
            var minDate = year + '-' + month + '-' + day;
    
            $('#tgl_kejadian').attr('min', minDate);
        });

        // ------- Message toaster ------- //

        // Login message
        @if (Session::has('pesan_login'))
            iziToast.success({
                    title: '!!!',
                    message: 'Anda berhasil melakukan login',
                    position: 'topCenter'
                });
        @endif

        // Loout message
        @if (Session::has('pesan_logout'))
            iziToast.error({
                title: '!!!',
                message: 'Anda sudah logout dari akun',
                position: 'topCenter'
            });
        @endif

        // Pengaduan message
        @if (Session::has('pengaduan_berhasil'))
            iziToast.show({
                title: 'Berhasil',
                message: 'Pengaduan sudah terkirim',
                position: 'topRight',
                color: 'green',
                layout: 2,
            });
        @elseif (Session::has('pengaduan_gagal'))
            iziToast.show({
                title: 'Gagal',
                message: 'Pengaduan tidak terkirim',
                position: 'topRight',
                color: 'red',
                layout: 2,
            });
        @endif
    </script>
</body>

</html>