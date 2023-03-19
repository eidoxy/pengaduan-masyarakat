<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\ValidationException;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil data masyarakat dari database
        $masyarakat = Masyarakat::all();

        return view('User.Profile.index', ['masyarakat' => $masyarakat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        // Mengambil data petugas yang di lihat detail
        $masyarakat = Masyarakat::where('nik', $nik)->first();


        return view('User.Profile.edit', ['masyarakat' => $masyarakat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        // $request->validate([
        //     'current_password' => ['required'],
        //     'password' => ['required', 'confirmed'],
        // ]);

        // if(Hash::check($request->current_password, auth()->user()->password)) {
        //     auth()->user()->update(['password' => Hash::check($request->password)]);

        //     return back()->with('pesan', 'Password Anda telah di update');
        // }

        // throw ValidationException::withMessages([
        //     'current_password' => 'Password anda tidak cocok dengan password sekarang',
        // ]);

        // // Mengabmil data masyarakat dari database
        $masyarakat = Masyarakat::find($nik);

        // Validate foto yang bisa di upload
        $request->validate([
            'foto' => 'mimes:png,jp,jpeg'
        ]);

        // Statement jika user mengupdate foto
        if ($request->hasFile('foto')){
            $foto = $request->file('foto');    // mengambil data foto dari request
            $ubah_nama_foto = time() . $foto->getClientOriginalName(); // mengubah nama foto dari waktu + nama asli
            $foto->move('foto', $ubah_nama_foto); // pindah

            $masyarakat->foto = $ubah_nama_foto;
            $masyarakat->save();
        }

        if ($request->filled('password')){
            $masyarakat->password = bcrypt($request->password);
            $masyarakat->save();
        }

        // Mengubah data masyarakat dengan data dari input
        $masyarakat->update([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'username' => $request['username'],
            'telp' => $request['telp'],
        ]);

        // Tampilan edit ata masyarakat
        // return redirect()->route('pekat.logout', ['masyarakat' => $masyarakat])->view('User.lapor')->with('pesan_logout', 'Silahkan login kembali');
        Auth::guard('masyarakat')->logout();

        return redirect()->route('pekat.formLogin')->with('pesan_update', 'Data sudah di update, silahkan login kembali');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}