<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'email'
    ];

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function Tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }
}
