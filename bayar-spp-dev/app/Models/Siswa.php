<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jurusan_id',
        'kelas_id',
        'nis',
        'nama',
        'email',
        'jenis_kelamin',
        'alamat',
        'telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi', 'siswa_id', 'id');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }

    public function jurusan()
    {
        return $this->hasOne('App\Models\Jurusan', 'id', 'jurusan_id');
    }

    public function kelas()
    {
        return $this->hasOne('App\Models\Kelas', 'id', 'kelas_id');
    }
}
