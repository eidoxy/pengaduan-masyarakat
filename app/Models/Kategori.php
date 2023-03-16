<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengaduan;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'id_kategori',
        'nama',
    ];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
