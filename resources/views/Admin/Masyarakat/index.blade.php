@extends('layouts.appAdmin')

@section('title', 'KELMAS - Masyarakat')
    
@section('css')
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="section-header">
        <h1>Masyarakat</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Menu Masyarakat</h2>
        <p class="section-lead">Pada halaman ini Anda dapat menghapus user Masyarakat.</p>
        <div class="card">
            <div class="card-header">
                <div class="">
                    <h4>Data Masyarakat</h4>
                </div>
            </div>

            <div class="card-body">
                <table id="masyarakatTable" class="table table-striped text-nowrap">
            
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Telp</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($masyarakat as $k => $v)
                        <tr>
                            <td>{{ $k += 1 }}</td>
                            <td>{{ $v->nik }}</td>
                            <td>{{ $v->nama }}</td>
                            <td>{{ $v->username }}</td>
                            <td>{{ $v->telp }}</td>
                            <td><a href="{{ route('masyarakat.show', $v->nik) }}" class="btn btn-primary btn-sm">Lihat</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#masyarakatTable').DataTable();
        } );

        
        @if (Session::has('notif_sukses'))
        iziToast.show({
                title: 'Berhasil',
                message: 'Masyarakat berhasil di hapus',
                position: 'topRight',
                color: 'red',
                layout: 2
            });
        @endif

        @if (Session::has('notif_gagal'))
        iziToast.show({
                title: '!!!',
                message: 'Tidak dapat dihapus, masyarakat memiliki relationship!',
                position: 'topRight',
                color: 'red',
                layout: 2
            });
        @endif
    </script>
@endsection