@extends('layouts.appAdmin')

@section('title', 'KELMAS - Tambah Petugas')
    
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
        <h1>Tambah Kategori</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('kategori.store') }}">Data Kategori</a></div>
            <div class="breadcrumb-item">Form Tambah Kategori</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-2 col-12">
    
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
    
                    <div class="card-header">
                        <strong>Form Tambah Petugas</strong>
                    </div>
    
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Kategori</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-success" style="width: 50%">TAMBAH KATEGORI</button>
                            </center>
                        </form>
                    </div>
    
                    {{-- @if (Session::has('username'))
                        <div class="alert alert-danger m-4">
                            {{ Session::get('username') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger m-4">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif --}}
                
                    
                </div>
            </div>
    
            <div class="col-lg-2 col-12">
                
            </div>
    
        </div>
    </div>
@endsection