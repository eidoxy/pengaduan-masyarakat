@extends('layouts.appAdmin')

@section('title', 'KELMAS - Detail Masyarakat')
    
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
        <h1>Detail Masyarakat</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('masyarakat.index') }}">Data Masyarakat</a></div>
            <div class="breadcrumb-item">Detail Masyarakat</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-2 col-12">

            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
    
                    <div class="card-header">
                        <div class="text-center">
                            <strong>Detail Masyarakat</strong>
                        </div>
                    </div>
    
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>NIK</th>
                                    <td>:</td>
                                    <td>{{ $masyarakat->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>:</td>
                                    <td>{{ $masyarakat->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{ $masyarakat->email }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>:</td>
                                    <td>{{ $masyarakat->username }}</td>
                                </tr>
                                <tr>
                                    <th>No Telp</th>
                                    <td>:</td>
                                    <td>{{ $masyarakat->telp }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Hapus Masyarakat</th>
                                    <td>:</td>
                                    <td>
                                        <form action="{{ route('masyarakat.destroy', $masyarakat->nik) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="width: 100%" onclick="return confirm('APAKAH YAKIN?')">HAPUS</button>
                                        </form>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('masyarakat.destroy', $masyarakat->nik) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <center>
                                <button type="submit" class="btn btn-danger" style="width: 50%" onclick="return confirm('APAKAH YAKIN?')">HAPUS DATA MASYARAKAT</button>
                            </center>
                        </form>
                    </div>
                    @if (Session::has('notif'))
                        <div class="alert alert-danger">
                            {{ Session::get('notif') }}
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-2 col-12">
                
            </div>
        </div>
    </div>
@endsection