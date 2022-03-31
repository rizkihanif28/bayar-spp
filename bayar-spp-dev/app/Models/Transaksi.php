<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'tagihan_id',
        'tu_id',
        'is_lunas',
    ];

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function tatus()
    {
        return $this->hasOne(Tatus::class);
    }
}
