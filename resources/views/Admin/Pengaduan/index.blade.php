@extends('layouts.appAdmin')

@section('title', 'KELMAS - Pengaduan')

@section('css')
    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
@endsection

@section('content')
    <div class="section-header">
        <h1>Pengaduan</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Menu Pengaduan</h2>
        <p class="section-lead">Pada halaman ini Anda dapat memberikan tanggapan dan mengubah status laporan.</p>
        <div class="card">
            <div class="card-header">
                <div class="">
                    <h4>Tabel Data Pengaduan</h4>
                </div>
            </div>

            <div class="card-body">
                <table id="pengaduanTable" class="table table-striped text-nowrap">
            
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Isi Laporan</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($pengaduan as $k => $v)
                        <tr>
                            <td>{{ $k += 1 }}</td>
                            <td>{{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
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
                            <td><a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" class="btn btn-primary btn-sm">Lihat</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    {{-- General JS --}}
    <script>
        $(document).ready(function() {
            $('#pengaduanTable').DataTable();
        } );
    </script>

@endsection