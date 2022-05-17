<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaksi_id',
        'jumlah',
    ];

    public function transaksi()
    {
        return $this->hasOne('App\Models\Transaksi', 'id', 'transaksi_id');
    }
}
