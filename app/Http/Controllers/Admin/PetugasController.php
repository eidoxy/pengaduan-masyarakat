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

        // Membuat data di database sesuai dengan input
        $validate = Validator::make($data, [
            'nama_petugas' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:petugas'],
            'password' => ['required', 'string', 'min:6'],
            'telp' => ['required'],
            'level' => ['required', 'in:admin,petugas'],
        ]);

        // Kondisi jika validate eror
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        // Mengambil nama username dari input
        $username = Petugas::where('username', $data['username'])->first();

        // Kondisi jika username sudah ada
        if ($username) {
            return redirect()->back()->with(['notif' => 'Username sudah digunakan!']);
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
        return redirect()->route('petugas.index');
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
        return redirect()->route('petugas.index');
    }

    public function destroy($id_petugas)
    {
        $petugas = Petugas::findOrFail($id_petugas);

        $tanggapan = Tanggapan::where('id_petugas', $id_petugas)->first();

        if (!$tanggapan) {
            $petugas->delete();

            return redirect()->route('petugas.index');
        } else {
            return redirect()->back()->with(['notif' => 'Can\'t delete. Petugas has a relationship!']);
        }
    }
}
