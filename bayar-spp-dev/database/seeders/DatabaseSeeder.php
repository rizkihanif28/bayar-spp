<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Periode;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Tatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        // membuat seed periode
        $periode1 = Periode::create([
            'nama' => '2021',
            'tgl_mulai' => '2021-01-01',
            'tgl_selesai' => '2022-01-01',
            'is_active' => 1
        ]);
        $periode2 = Periode::create([
            'nama' => '2022',
            'tgl_mulai' => '2022-01-01',
            'tgl_selesai' => '2023-01-01',
            'is_active' => 0
        ]);

        // membuat seed kelas
        $kelas1 = Kelas::create([
            'periode_id' => $periode1->id,
            'nama' => 'X'
        ]);
        $kelas2 = Kelas::create([
            'periode_id' => $periode1->id,
            'nama' => 'XI'
        ]);
        $kelas3 = Kelas::create([
            'periode_id' => $periode1->id,
            'nama' => 'XII'
        ]);

        // membuat seed jurusan
        $jurusan1 = Jurusan::create([
            'nama' => 'Teknik Sepeda Motor'
        ]);
        $jurusan2 = Jurusan::create([
            'nama' => 'Teknik Kendaraan Ringan'
        ]);
        $jurusan3 = Jurusan::create([
            'nama' => 'Akutansi'
        ]);
        $jurusan4 = Jurusan::create([
            'nama' => 'Administrasi Perkantoran'
        ]);

        //membuat seed tatausaha 
        $tatus = Tatus::create([
            'nip' => 10012,
            'nama' => 'Nurdiansyah',
            'email' => 'nurdin@gmail.com'
        ]);

        // membuat seed tagihan
        $tagihan = Tagihan::create([
            'tu_id' => $tatus->id,
            'nama' => 'Januari',
            'jumlah' => 300000,
            'wajib_semua' => 1
        ]);

        // membuat seed untuk data siswa
        Siswa::create([
            'jurusan_id' => $jurusan1->id,
            'kelas_id' => $kelas2->id,
            'nis' => '283286',
            'nama' => 'Ahmad Safriadi',
            'email' => 'sapri@gmail.com',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl Swadaya 2',
            'telepon' => '089526456198'
        ]);
    }
}
