<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaksi_id',
        'siswa_id',
        'tagihan_id',
        'jumlah',
    ];

    public function siswa()
    {
        return $this->hasOne('App\Models\Siswa', 'id', 'siswa_id');
    }

    public function tagihan()
    {
        return $this->hasOne('App\Models\Tagihan', 'id', 'tagihan_id');
    }

    public function transaksi()
    {
        return $this->hasOne('App\Models\Transaksi', 'id', 'transaksi_id');
    }
}
