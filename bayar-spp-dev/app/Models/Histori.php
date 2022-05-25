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
        'jumlah',
    ];

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    public function siswa()
    {
        return $this->hasOne('App\Models\Siswa', 'id', 'siswa_id');
    }
}
