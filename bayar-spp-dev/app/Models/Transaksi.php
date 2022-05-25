<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tu_id',
        'siswa_id',
        'tagihan_id',
        'periode_id',
        'nis',
        'tanggal_bayar',
    ];

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
    public function tatus()
    {
        return $this->hasOne(Tatus::class);
    }
    public function tagihan()
    {
        return $this->hasOne(Tagihan::class);
    }
    public function periode()
    {
        return $this->belongsToMany(Periode::class);
    }

    public function histori()
    {
        return $this->belongsTo(Histori::class);
    }
}
