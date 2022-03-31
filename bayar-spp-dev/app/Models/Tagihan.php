<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tgl_pembayaran',
        'jumlah',
        'wajib_semua',
        'kelas_id',
    ];

    public function tatus()
    {
        return $this->hasOne(Tatus::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
}
