@extends('layouts.appUser')

@section('title', 'KELMAS - Laporan')

@section('css')
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="section-header">
        <h1>Laporan</h1>
    </div>
    
    <div class="section-body">
        <h2 class="section-title">Laporan Saya</h2>
        <p class="section-lead">Anda dapat melihat laporan Anda disni.</p>
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="profile-widget">
                    <div class="profile-widget-header">
                        {{-- <img alt="image" src="assets/img/avatar/avatar-1.png"
                            class="rounded-circle profile-widget-picture"> --}}
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">
                                    <h4>
                                        Pending
                                    </h4>
                                </div>
                                <div class="profile-widget-item-value">
                                    <h4>
                                        {{ $hitung[0] }}
                                    </h4>
                                </div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">
                                    <h4>
                                        Proses
                                    </h4>
                                </div>
                                <div class="profile-widget-item-value">
                                    <h4>
                                        {{ $hitung[1] }}
                                    </h4>
                                </div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">
                                    <h4>
                                        Selesai
                                    </h4>
                                </div>
                                <div class="profile-widget-item-value">
                                    <h4>
                                        {{ $hitung[2] }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="card-footer text-center">
                        {{-- <div class="font-weight-bold mb-2">Follow Ujang On</div>
                        <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-github mr-1">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </a> --}}
                    </div>

                    <hr>

                    <div class="card container shadow-sm">
                        <div class="card-header">
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a class="btn {{ $siapa != 'me' ? 'btn-primary' : ''}} mr-4"
                                        href="{{ route('pekat.laporan') }}">
                                        Semua
                                    </a>
                                    <a class="btn {{ $siapa == 'me' ? 'btn-primary' : ''}}"
                                        href="{{ route('pekat.laporan', 'me') }}">
                                        Laporan Saya
                                    </a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body">
                            {{-- Laporan Saya --}}
                            @foreach ($pengaduan as $k => $v)
                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                    <li class="media container p-3 shadow">
                                        {{-- <img alt="image" class="mr-3 rounded-circle" width="70"
                                            src="{{ asset('images/user_default.svg') }}"> --}}
                                        <div class="media-body">
                                            <div class="media-right">
                                                <div class="text-primary">
                                                    @if ($v->status == '0')
                                                    <p class="badge badge-danger text-white">Pending</p>
                                                    @elseif($v->status == 'proses')
                                                    <p class="badge badge-warning text-white">{{ ucwords($v->status) }}</p>
                                                    @else
                                                    <p class="badge badge-success text-white">{{ ucwords($v->status) }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="media-title mb-1">{{ $v->user->nama }}</div>
                                            <div class="text-time">{{ $v->tgl_pengaduan->format('d M, h:i') }}</div>
                                            <div class="media-title mb-1">{{ $v->judul_laporan }}</div>
                                            <div class="media-description text-muted">
                                                {{ $v->isi_laporan }}
                                            </div>
                                            @if ($v->foto != null)
                                                <img src="{{ Storage::url($v->foto) }}" alt="{{ 'Gambar '.$v->judul_laporan }}" class="img-thumbnail" style="width: 20%;">
                                            @endif
                                            <hr>
                                            @if ($v->tanggapan != null)
                                                <div class="media-title mb-1">
                                                    Tanggapan dari {{ $v->tanggapan->petugas->nama_petugas }}
                                                </div>
                                                <div class="media-description text-muted">
                                                    {{ $v->tanggapan->tanggapan }}
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    
@endsection

@section('script')
    <script>
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
    </script>
@endsection