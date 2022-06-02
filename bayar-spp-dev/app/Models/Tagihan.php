<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode',
        'jumlah',
        'wajib_semua',
    ];

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    public function histori()
    {
        return $this->hasOne(Histori::class);
    }
}
