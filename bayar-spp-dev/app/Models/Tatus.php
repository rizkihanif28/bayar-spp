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

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function histori()
    {
        return $this->hasOne(Histori::class);
    }
}
