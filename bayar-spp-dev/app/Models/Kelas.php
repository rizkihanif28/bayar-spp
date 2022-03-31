<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode_id',
        'nama'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function periode()
    {
        return $this->hasOne('App\Models\Periode', 'id', 'periode_id');
    }
}
