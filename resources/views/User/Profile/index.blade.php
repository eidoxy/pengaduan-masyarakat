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
                </div>

                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <div class="d-flex justify-content-center">
                            <img alt="image" src="{{ asset('foto/' . Auth::guard('masyarakat')->user()->foto) }}" class="rounded-circle profile-widget-picture">
                        </div>
                    </div>
                    <div class="profile-widget-description mx-5">
                        
                        @if (Session::has('currrent_password'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    {{ Session::get('currrent_password') }}
                                </div>
                            </div>
                        @endif
                        
                        <form action="{{ route('profil.update', Auth::guard('masyarakat')->user()->nik) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="number" name="nik" id="nik" value="{{ Auth::guard('masyarakat')->user()->nik}}" class="form-control" disabled>
                            <div class="invalid-feedback">
                                Please fill in the first name
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ Auth::guard('masyarakat')->user()->nama}}" class="form-control" required>
                            <div class="invalid-feedback">
                                Please fill in the last name
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::guard('masyarakat')->user()->email}}" class="form-control" required>
                            <div class="invalid-feedback">
                                Please fill in the last name
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" value="{{ Auth::guard('masyarakat')->user()->username}}" class="form-control" required>
                            <div class="invalid-feedback">
                                Please fill in the last name
                            </div>
                        </div>

                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" name="telp" id="telp" value="{{ Auth::guard('masyarakat')->user()->telp}}" class="form-control" maxlength="13" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                            <div class="invalid-feedback">
                                Please fill in the last name
                            </div>
                        </div>

                        <label>Foto</label>
                        <div class="custom-file mb-3">
                            <input name="foto" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih foto</label>
                            <div class="invalid-feedback">
                                Please fill in the last name
                            </div>
                        </div>

                        {{-- <div class="form-group">
                        <label for="current_password">Password Saat Ini</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                        </div> --}}

                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <div class="invalid-feedback">
                                Please fill in the last name
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-warning text-white" style="width: 50%">UPDATE</button>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection

@section('script')
    <script>
        function editData(url) {
            $('#editModal').modal('show');

            $('#editModal form')[0].reset();
            $('#editModal form').attr('action', url);
        }

        // Password message tidak sesuai
        @if (Session::has('current_password'))
            iziToast.console.error();({
                    title: '!!!',
                    message: 'Password anda tidak cocok dengan password sekarang',
                    position: 'topCenter'
                });
        @endif
    </script>
@endsection