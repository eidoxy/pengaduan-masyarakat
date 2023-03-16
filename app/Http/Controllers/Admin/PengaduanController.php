<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Order;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {

        $pengaduan = Pengaduan::query();

        $pengaduan->when($request->status, function ($query) use ($request) {
            return $query->where('status', '=', $request->status);
        });

        // Mengambil data pengaduan berdasarkan tanggal yang paling baru
        $pengaduan = Pengaduan::orderBy('tgl_pengaduan', 'desc')->get();

        // Tampilan utama pengaduan & compact $pengaduan
        return view('Admin.Pengaduan.index', ['pengaduan' => $pengaduan, 'pengaduan$pengaduan' => $pengaduan]);
    }

    public function show($id_pengaduan)
    {
        // Mengambil data pengaduan dan tanggapan yang saat ini
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();

        $kategori = Kategori::orderBy('id_kategori', 'desc')->get();

        // Tampilan detail pengaduan & compact $pengaduan dan $tanggapan
        return view('Admin.Pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan, 'kategori' => $kategori]);
    }
}
