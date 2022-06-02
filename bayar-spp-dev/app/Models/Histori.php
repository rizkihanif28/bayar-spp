<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaksi_id',
        'tu_id',
        'siswa_id',
        'tagihan_id',
        'nis',
        'tanggal_bayar'
    ];

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'id', 'siswa_id');
    }

    public function tatus()
    {
        return $this->belongsTo(Tatus::class);
    }

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class);
    }
}
