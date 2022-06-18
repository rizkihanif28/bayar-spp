<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kelas_id',
        'nis',
        'nama_siswa',
        'email',
        'jenis_kelamin',
        'alamat',
        'telepon',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function histori()
    {
        return $this->hasMany(Histori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
