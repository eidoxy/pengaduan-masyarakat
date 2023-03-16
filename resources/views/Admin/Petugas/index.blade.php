@extends('layouts.appAdmin')

@section('title', 'KELMAS - Petugas')

@section('css')
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="section-header">
        <h1>Petugas</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Menu Petugas</h2>
        <p class="section-lead">Pada halaman ini Anda dapat menambah, mengubah, dan menghapus user Petugas.</p>
        <div class="card">
            <div class="card-header">
                <div class="col-12 col-lg-10 col-md-10">
                    <div>
                        <h4>Tabel Data Petugas</h4>
                    </div>
                </div>
                
                <div class="col-12 col-lg-2 col-md-2">
                    <a href="{{ route('petugas.create') }}" class="btn btn-tool btn-success shadow-sm rounded-pill"><i class="fa fa-plus"></i> Petugas</a>
                </div>

                {{-- <a href="{{ route('petugas.create') }}" class="btn btn-purple mb-2">Tambah Petugas</a> --}}
                
            </div>

            <div class="card-body">
                <table id="petugasTable" class="table table-striped text-nowrap" style="width: 100%;">
        
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>Username</th>
                            <th>Telp</th>
                            <th>Level</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($petugas as $k => $v)
                        <tr>
                            <td>{{ $k += 1 }}</td>
                            <td>{{ $v->nama_petugas }}</td>
                            <td>{{ $v->username }}</td>
                            <td>{{ $v->telp }}</td>
                            <td>{{ $v->level }}</td>
                            <td><a href="{{ route('petugas.edit', $v->id_petugas) }}" class="btn btn-primary btn-sm">Lihat</a></td>
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
            $('#petugasTable').DataTable();
        } );
    </script>
@endsection