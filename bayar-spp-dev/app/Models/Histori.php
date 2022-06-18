<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaksi_id',
        'petugas_id',
        'siswa_id',
        'bulan_bayar',
        'tahun_bayar',
        'nis',
        'jumlah_bayar',
        'tanggal_bayar'
    ];

    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
