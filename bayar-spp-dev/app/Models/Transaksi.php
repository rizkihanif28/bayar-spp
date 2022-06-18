<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'petugas_id',
        'siswa_id',
        'kelas_id',
        'bulan_bayar',
        'tahun_bayar',
        'nis',
        'jumlah_bayar',
        'tanggal_bayar'
    ];

    public function getTanggalBayarAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getJumlahBayarAttribute($value)
    {
        return "Rp " . number_format($value, 0, 2, '.');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function histori()
    {
        return $this->hasMany(Histori::class);
    }
}
