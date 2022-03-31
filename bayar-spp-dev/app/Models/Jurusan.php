<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'nama'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
