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
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                            <center>
                                <button onclick="deleteData('{{ route('masyarakat.destroy', $masyarakat->nik) }}')" class="btn btn-danger" style="width: 50%">HAPUS DATA MASYARAKAT</button>
                            </center>
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

@section('js')
<script>
    function deleteData(url){
        swal({
        title: "Apa Anda yakin?",
            text: "Jika Anda klik OK, maka data masyarakat akan terhapus!",
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
                text: "Data masyarkat berhasil dihapus!",
                icon: "success",
                });
            })
            .fail((errors) => {
                swal({
                title: "Gagal",
                text: "Data masyarkat gagal dihapus!",
                icon: "error",
                });
            })
            window.location.href = '{{ route('masyarakat.index') }}';
            }
        });
    }
</script>
@endsection