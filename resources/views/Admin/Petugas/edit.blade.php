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
                            <center>
                                <button onclick="deleteData('{{ route('petugas.destroy', $petugas->id_petugas) }}')" class="btn btn-danger mt-2" style="width: 50%">HAPUS</button>
                            </center>
                        @endif

                        {{-- Pesan Ketika Error --}}
                        @if (Session::has('notif_gagal'))
                            <div class="alert alert-danger">
                                {{ Session::get('notif_gagal') }}
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

@section('js')
<script>
    @if (Session::has('pesan_update'))
    iziToast.show({
            title: '!!!',
            message: 'Akun petugas telah diupdate',
            position: 'topRight',
            color: 'green',
            layout: 2
        });
    @endif

    @if (Session::has('notif_gagal'))
    iziToast.show({
            title: '!!!',
            message: 'Tidak dapat dihapus, Petugas ini memiliki relationship!',
            position: 'topRight',
            color: 'red',
            layout: 2
        });
    @endif

    // Fungsi delete data
    function deleteData(url){
        swal({
        title: "Apa Anda yakin?",
            text: "Jika Anda klik OK, maka data petugas akan terhapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, {
                '_token' : $('[name=csrf-token]').attr('content'),
                '_method' : 'delete',
            })
            .done((response) => {
                swal({
                title: "Sukses",
                text: "Data petugas berhasil dihapus!",
                icon: "success",
                });
            })
            .fail((errors) => {
                swal({
                title: "Gagal",
                text: "Data petugas gagal dihapus!",
                icon: "error",
                });
            })
            window.location.href = '{{ route('petugas.index') }}';
            }
        });
    }
</script>
@endsection