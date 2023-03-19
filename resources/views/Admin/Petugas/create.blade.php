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
        <h1>Tambah Petugas</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('petugas.index') }}">Data Petugas</a></div>
            <div class="breadcrumb-item">Form Tambah Petugas</div>
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
                        @if (Session::has('username'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ Session::get('username') }}
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>×</span>
                                        </button>
                                        {{ $error }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        
                        <form action="{{ route('petugas.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_petugas">Nama Petugas</label>
                                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="telp">No Telp</label>
                                <input type="text" name="telp" id="telp" class="form-control" maxlength="13" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <div class="input-group mb-3">
                                    <select name="level" id="level" class="custom-select">
                                        <option value="petugas" selected>Pilih Level (Default Petugas)</option>
                                        <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-success" style="width: 50%">TAMBAH PETUGAS</button>
                            </center>
                        </form>
                    </div>
    
                </div>
            </div>
    
            <div class="col-lg-2 col-12">
                
            </div>
    
        </div>
    </div>
@endsection\

@section('js')
<script>
    @if (Session::has('notif'))
        iziToast.show({
                title: '!!!',
                message: 'Username telah digunakan',
                position: 'topRight',
                color: 'yellow',
                layout: 2
            });
        @endif
</script>
@endsection

