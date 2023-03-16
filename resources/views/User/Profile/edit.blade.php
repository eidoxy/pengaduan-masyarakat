{{-- Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3 class="mt-3">Edit Data Anda</h3>
                </div>
                <form action="{{ route('profile.update', Auth::guard('masyarakat')->user()->nik) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" value="{{ Auth::guard('masyarakat')->user()->nik}}" name="nik" id="nik" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" value="{{ Auth::guard('masyarakat')->user()->nama}}" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ Auth::guard('masyarakat')->user()->email}}" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" value="{{ Auth::guard('masyarakat')->user()->username}}" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="number" value="{{ Auth::guard('masyarakat')->user()->telp}}" name="telp" id="telp" class="form-control" required>
                    </div>

                    {{-- <div class="form-group">
                        <label for="current_password">Password Saat Ini</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                    </div> --}}

                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    {{-- <div class="form-group">
                        <label for="confirm_password">Konfirmasi Password Baru</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div> --}}

                    <center>
                        <button type="submit" class="btn btn-warning text-white" style="width: 50%">UPDATE</button>
                    </center>
                </form>
                @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>