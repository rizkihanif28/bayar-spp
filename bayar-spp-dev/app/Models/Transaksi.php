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
        'total',
        'is lunas'
    ];

    public function siswa()
    {
        return $this->hasOne('App\Models\Siswa', 'id', 'siswa_id');
    }

    public function tatus()
    {
        return $this->hasOne('App\Models\Tatus', 'id', 'tu_id');
    }
    public function tagihan()
    {
        return $this->hasOne('App\Models\Tagihan', 'id', 'tagihan_id');
    }
}
