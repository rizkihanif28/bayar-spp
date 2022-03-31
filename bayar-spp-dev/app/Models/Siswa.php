<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'jurusan_id',
        'kelas_id',
        'nama',
        'email',
        'jenis_kelamin',
        'alamat',
        'telepon',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class);
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }
}
