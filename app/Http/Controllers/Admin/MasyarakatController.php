<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        // Mengambil data masyarakat dari database
        $masyarakat = Masyarakat::all();

        // Tampilan awal masyarakat & compact $masyarakat
        return view('Admin.Masyarakat.index', ['masyarakat' => $masyarakat]);
    }

    public function show($nik)
    {
        // Mengambil data masyarakat yang sedang di edit
        $masyarakat = Masyarakat::where('nik', $nik)->first();

        // Tampilan data masyarakat yang di edit & compact $masyarakat
        return view('Admin.Masyarakat.show', ['masyarakat' => $masyarakat]);
    }

    public function destroy(Masyarakat $masyarakat)
    {
        $pengaduan = Pengaduan::where('nik', $masyarakat->nik)->first();

        if (!$pengaduan) {
            $masyarakat->delete();

            return redirect()->route('masyarakat.index');
        } else {
            return redirect()->back()->with(['notif' => 'Can\'t delete. Masyarakat has a relationship!']);
        }
    }
}
