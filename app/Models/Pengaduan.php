<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use App\Models\Kategori;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'tgl_pengaduan',
        'nik',
        'judul_laporan',
        'isi_laporan',
        'tgl_kejadian',
        'lokasi_kejadian',
        'id_kategori',
        'foto',
        'status',
    ];

    protected $dates = [
        'tgl_pengaduan',
        'tgl_kejadian',
    ];

    public function user()
    {
        return $this->hasOne(Masyarakat::class, 'nik', 'nik');
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
