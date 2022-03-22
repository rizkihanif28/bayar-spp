<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nis',
        'nama',
        'email',
        'jenis_kelamin',
        'kelas',
        'jurusan',
        'alamat',
        'telepon',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
