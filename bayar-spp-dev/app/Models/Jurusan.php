<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    public function histori()
    {
        return $this->hasOne(Histori::class);
    }
}
