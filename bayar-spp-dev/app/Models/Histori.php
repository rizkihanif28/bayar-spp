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
        'kelas_id',
        'jurusan_id',
        'periode',
        'nis',
        'jumlah',
        'tanggal_bayar'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
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
        return $this->belongsTo(Kelas::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
