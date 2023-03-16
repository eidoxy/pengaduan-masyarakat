@extends('layouts.appUser')

@section('title', 'KELMAS - Profile')

@section('css')
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="section-header">
        <h1>Profile</h1>
    </div>
    
    <div class="section-body">
        <h2 class="section-title">Data Profile</h2>
        <p class="section-lead">Anda dapat melihat profile dan mengubah data profile Anda.</p>
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-12 col-lg-10 col-md-10">
                        <div>
                            <h4>Data Profile Anda</h4>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-2 col-md-2">
                        <button type="button" class="btn btn-tool btn-warning shadow-sm rounded-pill" data-toggle="modal" data-target="#editModal"><i class="fa fa-pen"></i> Edit Data</button>
                        {{-- <a href="{{ route('petugas.create') }}" class="btn btn-tool btn-warning shadow-sm rounded-pill"><i class="fa fa-pen"></i> Edit Data</a> --}}
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ Auth::guard('masyarakat')->user()->nik}}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ Auth::guard('masyarakat')->user()->nama}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ Auth::guard('masyarakat')->user()->email}}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ Auth::guard('masyarakat')->user()->username}}</td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:</td>
                                <td>{{ Auth::guard('masyarakat')->user()->telp}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <div class="card-footer">
                    <center>
                        <button type="submit" class="btn btn-warning" style="width: 50%">Edit Data</button>
                    </center>
                </div> --}}

            </div>
        </div>
        
    </div>

    
@endsection

@include('User.Profile.edit')

@section('script')
    <script>
        function editData(url) {
            $('#editModal').modal('show');
        }
    </script>
@endsection