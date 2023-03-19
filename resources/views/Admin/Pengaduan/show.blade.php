@extends('layouts.appAdmin')

@section('title', 'KELMAS - Detail Pengaduan')
    
@section('css')
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
    <style>
        .text-primary:hover {
            text-decoration: underline;
        }

        .text-grey {
            color: #6c757d;
        }

        .text-grey:hover {
            color: #6c757d;
        }

        .btn-purple {
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="section-header">
        <h1>Detail Pengaduan</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('pengaduan.index') }}">Data Pengaduan</a></div>
            <div class="breadcrumb-item">Detail Pengaduan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
    
                    <div class="card-header">
                        <div class="text-center">
                            Pengaduan Masyarakat
                        </div>
                    </div>
    
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>NIK</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Masyarakat</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->user->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pengaduan</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->tgl_pengaduan->format('d-M-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Foto</th>
                                    <td>:</td>
                                    <td><img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" class="embed-responsive"></td>
                                </tr>
                                <tr>
                                    <th>Judul Laporan</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->judul_laporan }}</td>
                                </tr>
                                <tr>
                                    <th>Isi Laporan</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->isi_laporan }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Kejadian</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->tgl_kejadian->format('d-M-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori Kejadian</th>
                                    <td>:</td>
                                    <td>
                                        @foreach ($kategori as $k)
                                            {{($k->nama) ? $k->nama : '-'}}
                                        @endforeach
                                        {{-- {{ $pengaduan->kategori->nama }} --}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>
                                        @if ($pengaduan->status == '0')
                                            <a href="" class="badge badge-danger">Pending</a>
                                        @elseif($pengaduan->status == 'proses')
                                            <a href="" class="badge badge-warning text-white">Proses</a>
                                        @else
                                            <a href="" class="badge badge-success">Selesai</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Lokasi Kejadian</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->lokasi_kejadian }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
    
                </div>
            </div>
    
            <div class="col-lg-6 col-12">
                <div class="card">
    
                    <div class="card-header">
                        <div class="text-center">
                            Tanggapan Petugas
                        </div>
                    </div>
    
                    <div class="card-body">
                        <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST">
                            @csrf
                            {{-- Value berdasarkan pengaudan yang telah di pencet detailnya --}}
                            <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
    
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="input-group mb-3">
                                    <select name="status" id="status" class="custom-select">
                                        @if ($pengaduan->status == '0')
                                            <option selected value="0">Pending</option>
                                            <option value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                        @elseif($pengaduan->status == 'proses')
                                            <option value="0">Pending</option>
                                            <option selected value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                        @else
                                            <option value="0">Pending</option>
                                            <option value="proses">Proses</option>
                                            <option selected value="selesai">Selesai</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="tanggapan">Tanggapan</label>
                                <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" placeholder="Belum ada tanggapan">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-purple">KIRIM</button>
                        </form>
                        
                    </div>
    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if (Session::has('status_selesai'))
        iziToast.show({
                title: 'Tanggapan',
                message: 'Laporan Telah Selesai!',
                position: 'topRight',
                color: 'green',
                layout: 2
            });
        @endif


        @if (Session::has('status_proses'))
        iziToast.show({
                title: 'Tanggapan',
                message: 'Laporan Diproses!',
                position: 'topRight',
                color: 'yellow',
                layout: 2
            });
        @endif
    </script>
@endsection