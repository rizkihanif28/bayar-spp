<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tu_id',
        'siswa_id',
        'tagihan_id',
    ];

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function tatus()
    {
        return $this->hasOne(Tatus::class);
    }
    public function tagihan()
    {
        return $this->hasOne('App\Models\Tagihan', 'id', 'tagihan_id');
    }
}
