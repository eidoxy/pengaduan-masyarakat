@extends('layouts.appAdmin')

@section('title', 'KELMAS - Petugas')

@section('css')
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="section-header">
        <h1>Kategori</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Menu Kategori</h2>
        <p class="section-lead">Pada halaman ini Anda dapat menamba dan menghapus Kategori.</p>
        <div class="card">
            <div class="card-header">
                <div class="col-12 col-lg-10 col-md-10">
                    <div>
                        <h4>Tabel Data Kategori</h4>
                    </div>
                </div>
                
                <div class="col-12 col-lg-2 col-md-2">
                    <a href="{{ route('kategori.create') }}" class="btn btn-tool btn-success shadow-sm rounded-pill"><i class="fa fa-plus"></i> Kategori</a>
                </div>

                {{-- <a href="{{ route('petugas.create') }}" class="btn btn-purple mb-2">Tambah Petugas</a> --}}
                
            </div>

            <div class="card-body">
                <table id="kategoriTable" class="table table-striped text-nowrap" style="width: 100%;">
        
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($kategori as $k => $v)
                        <tr>
                            <td>{{ $k += 1 }}</td>
                            <td>{{ $v->nama }}</td>
                            <td>
                                {{-- <a href="{{ route('petugas.destroy', $v->id_kategori) }}" class="btn btn-danger btn-sm">Hapus</a> --}}
                                {{-- <form class="formDelete" id="formDelete" action="#" method="POST">
                                    @csrf
                                    @method('DELETE') --}}
                                    <center>
                                        <button onclick="deleteData('{{ route('kategori.destroy', $v->id_kategori) }}')" class="btn btn-danger btn-sm" id="deleteData">Hapus</button>
                                    </center>
                                {{-- </form> --}}
                            </td>
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
            table = $('#kategoriTable').DataTable({
                proccesing: true,
                autowidth: false,
            });
        } );

        @if (Session::has('pesan_tambah'))
        iziToast.show({
                title: 'Sukses',
                message: 'Kategori berhasil ditambah',
                position: 'topRight',
                color: 'green',
                layout: 2
            });
        @endif

        @if (Session::has('pesan'))
        iziToast.show({
                title: 'Sukses',
                message: 'Kategori berhasil dihapus',
                position: 'topRight',
                color: 'red',
                layout: 2
            });
        @endif

        // Fungsi delete data
        function deleteData(url){
            swal({
            title: "Apa Anda yakin?",
                text: "Jika Anda klik OK, maka data kategori akan terhapus!",
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
                    text: "Data kategori berhasil dihapus!",
                    icon: "success",
                    });
                })
                .fail((errors) => {
                    swal({
                    title: "Gagal",
                    text: "Data kategori gagal dihapus!",
                    icon: "error",
                    });
                })
                location.reload();
                }
            });
        }
    </script>
@endsection