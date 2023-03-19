<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        // Mengambil data pengaduan berdasarkan tanggal yang paling baru
        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();

        // Kondisi tanggapan
        if ($tanggapan) {
            // Jika tanggapan sudah ada
            $pengaduan->update(['status' => $request->status]);

            $tanggapan->update([
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with(['status_selesai' => 'Laporan Telah Selesai!']);
        } else {
            // Jika tanggapan belum ada
            $pengaduan->update(['status' => $request->status]);

            $tanggapan = Tanggapan::create([
                'id_pengaduan' => $request->id_pengaduan,
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with(['status_proses' => 'Laporan Diproses!']);
        }
    }
}
