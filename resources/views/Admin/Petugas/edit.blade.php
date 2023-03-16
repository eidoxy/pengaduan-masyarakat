@extends('layouts.appAdmin')

@section('title', 'KELMAS - Edit Petugas')
    
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
    </style>
@endsection

@section('content')
    <div class="section-header">
        <h1>Edit Petugas</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('petugas.index') }}">Data Petugas</a></div>
            <div class="breadcrumb-item">Form Edit Petugas</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-2 col-12">

            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Form Edit Petugas</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="nama_petugas">Nama Petugas</label>
                                <input type="text" value="{{ $petugas->nama_petugas }}" name="nama_petugas" id="nama_petugas" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" value="{{ $petugas->username }}" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="telp">No Telp</label>
                                <input type="number" value="{{ $petugas->telp }}" name="telp" id="telp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <div class="input-group mb-3">
                                    <select name="level" id="level" class="custom-select">
                                        @if ($petugas->level == 'admin')
                                        <option selected value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                        @else
                                        <option value="admin">Admin</option>
                                        <option selected value="petugas">Petugas</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-warning text-white" style="width: 50%">UPDATE</button>
                            </center>
                        </form>
                        @if ($petugas->id_petugas != 1)
                        <form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <center>
                                <button type="submit" class="btn btn-danger mt-2" style="width: 50%" onclick="return confirm('APAKAH YAKIN?')">HAPUS</button>
                            </center>
                        </form>
                        @endif

                        {{-- Pesan Ketika Error --}}
                        @if (Session::has('notif'))
                            <div class="alert alert-danger">
                                {{ Session::get('notif') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-12">
                
            </div>

        </div>
    </div>
@endsection

