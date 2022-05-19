<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nip',
        'nama',
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function Tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }
}
