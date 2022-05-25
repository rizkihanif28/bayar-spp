<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tu_id',
        'nama',
        'jumlah',
        'wajib_semua',
        'kelas_id',
    ];

    public function tatus()
    {
        return $this->hasOne(Tatus::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function transaksiToday()
    {
        return $this->transaksi()->whereDate('created_at', now()->today());
    }

    public function kelas()
    {
        return $this->hasOne('App\Models\Kelas', 'id', 'kelas_id');
    }
}
