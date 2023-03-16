@extends('layouts.appAdmin')

@section('title', 'KELMAS - Laporan')
    
@section('css')
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
@endsection
    
@section('content')
    <div class="section-header">
        <h1>Laporan</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Menu Laporan</h2>
        <p class="section-lead">Pada halaman ini Anda dapat mencari dan mencetak laporan pengaduan berdasarkan tanggal.</p>
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="card">
    
                    <div class="card-header">
                        <strong>Cari Berdasarkan Tanggal & Status</strong>
                    </div>
    
                    <div class="card-body">
                        <form action="{{ route('laporan.getLaporan') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="from" class="form-control" placeholder="Tanggal Awal" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                            </div>
                            <div class="form-group">
                                <input type="text" name="to" class="form-control" placeholder="Tanggal Akhir" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <select name="status" id="status" class="custom-select">
                                        <option value="semua" selected>Semua Status</option>
                                        <option value="0">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%">Cari Laporan</button>
                        </form>
                    </div>
    
                </div>
            </div>
    
            <div class="col-lg-8 col-12">
                <div class="card">
    
                    <div class="card-header">
                        <div class="col-lg-10 col-12">
                            <strong>Data Berdasarkan Tanggal</strong>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="float-right">
                                @if ($pengaduan ?? '')
                                    <a href="{{ route('laporan.cetakLaporan', ['from' => $from, 'to' => $to, 'status' => $status]) }}" class="btn btn-danger">DOWNLOAD PDF</a>
                                @endif
                            </div>
                        </div>
                    </div>
    
                    <div class="card-body">
                        @if ($pengaduan ?? '')
                            <table class="table">
                                
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Isi Laporan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach ($pengaduan as $k => $v)
                                        <tr>
                                            <td>{{ $k += 1 }}</td>
                                            <td>{{ $v->tgl_pengaduan }}</td>
                                            <td>{{ $v->isi_laporan }}</td>
                                            <td>
                                                @if ($v->status == '0')
                                                    <a href="" class="badge badge-danger">Pending</a>
                                                @elseif($v->status == 'proses')
                                                    <a href="" class="badge badge-warning text-white">Proses</a>
                                                @else
                                                    <a href="" class="badge badge-success">Selesai</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
    
                            </table>
                        @else
                            <div class="text-center">
                                Tidak ada data
                            </div>
                        @endif
                    </div>
    
                </div>
            </div>
        </div>
    </div>
@endsection