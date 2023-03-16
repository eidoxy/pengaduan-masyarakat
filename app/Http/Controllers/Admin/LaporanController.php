<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.index');
    }

    public function getLaporan(Request $request)
    {
        // Mengambil data date yang di ambil/ yang di inputkan
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';
        $status = $request->status;

        // Mengambil data laporan berdasarkan tanggal from&to
        if($status == 'semua'){
            $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])
            ->get();

        } else {
            $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])
                ->where('status', 'LIKE', '%'.$status.'%')
                ->get();
        }

        // Tampilan laporan & compact $pengaduan, $from, $to
        return view('Admin.Laporan.index', ['pengaduan' => $pengaduan, 'from' => $from, 'to' => $to, 'status' => $status]);
    }

    public function cetakLaporan(Request $request, $from, $to)
    {
        $status = $request->status;

        // Mengambil data laporan berdasarkan tanggal from&to dan status
        if($status == 'semua'){
            $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])
                ->get();

        } else {
            $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])
                ->where('status', 'LIKE', '%'.$status.'%')
                ->get();
        }

        // Tampilan pdf dengan data $pengaduan yang diatas
        $pdf = PDF::loadView('Admin.Laporan.cetak', ['pengaduan' => $pengaduan, 'status' => $status]);
        return $pdf->download('laporan-pengaduan.pdf', ['pengaduan' => $pengaduan, 'status' => $status]);
    }
}
