<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index()
    {
        // Mengambil data petugas
        $petugas = Petugas::all();

        // Tampilan index & compact
        return view('Admin.Petugas.index', ['petugas' => $petugas]);
    }

    public function create()
    {
        return view('Admin.Petugas.create');
    }

    public function store(Request $request)
    {
        // Mengambil data sesuai dengan input
        $data = $request->all();

         // Membuat custom error message
        $errors = [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.regex' => 'Nama tidak boleh mengandung angka',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
            'password.regex' => 'Password harus mengandung 1 huruf kecil, 1 huruf kapital, 1 angka, dan 1 spesial karakter',
            'telp.required' => 'Telepon tidak boleh kosong',
            'telp.min' => 'Telepon minimal 12 angka',
            'telp.max' => 'Telepon maximal 13 angka',
        ];

        // Membuat data di database sesuai dengan input
        $validate = Validator::make($data, [
            'nama_petugas' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'unique:petugas'],
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/'  // must contain a special character
            ],
            'telp' => ['required', 'min:12', 'max:13'],
            'level' => ['required', 'in:admin,petugas'],
        ], $errors);

        // Kondisi jika validate eror
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Mengambil nama username dari input
        $username = Petugas::where('username', $data['username'])->first();

        // Kondisi jika username sudah ada
        if ($username) {
            return redirect()->back()->with(['notif' => 'Username sudah digunakan!'])->withInput();
        }

        // Kondisi jika username tidak ada
        Petugas::create([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        // Kembali ke tampilan
        return redirect()->route('petugas.index')->with(['pesan_petugas' => 'Akun petugas telah dibuat']);
    }

    public function edit($id_petugas)
    {
        // Mengambil data petugas yang di lihat detail
        $petugas = Petugas::where('id_petugas', $id_petugas)->first();

        return view('Admin.Petugas.edit', ['petugas' => $petugas]);
    }

    public function update(Request $request, $id_petugas)
    {
        // Mengabil data petugas dari input
        $data = $request->all();

        // Mengabmil data petugas dari database
        $petugas = Petugas::find($id_petugas);

        // Mengubah data petugas dengan data dari input
        $petugas->update([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        // Tampilan edit ata petugas
        return redirect()->route('petugas.index')->with(['pesan_update' => 'Profile petugas telah di update']);
    }

    public function destroy($id_petugas)
    {
        $petugas = Petugas::findOrFail($id_petugas);

        $tanggapan = Tanggapan::where('id_petugas', $id_petugas)->first();

        if (!$tanggapan) {
            $petugas->delete();

            return redirect()->route('petugas.index')->with(['notif_sukses' => 'Petugas berhasil di hapus']);
        } else {
            return redirect()->back()->with(['notif_gagal' => 'Tidak dapat dihapus, Petugas ini memiliki relationship!']);
        }
    }
}
