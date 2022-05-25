<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tgl_mulai',
        'tgl_selesai',
        'is_active'
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function Transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
