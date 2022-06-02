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
        'nis',
        'tanggal_bayar'
    ];

    public function tatus()
    {
        return $this->belongsTo(Tatus::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class);
    }

    public function histori()
    {
        return $this->belongsTo(Histori::class);
    }
}
