<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBayar extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'siswa_id',
        'jan',
        'feb',
        'mar',
        'apr',
        'mei',
        'jun',
        'jul',
        'agust',
        'sept',
        'okt',
        'nov',
        'des',
    ];

    public function siswa()
    {
        return $this->hasOne('app\Models\Siswa', 'id', 'siswa_id');
    }

    public function transaksi()
    {
        return $this->hasOne('app\Models\Transaksi', 'id', 'transaksi_id');
    }
}
