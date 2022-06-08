<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Periode;
use App\Models\Petugas;
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

        // membuat seed kelas
        $kelas1 = Kelas::create([
            'nama' => 'X'
        ]);
        $kelas2 = Kelas::create([
            'nama' => 'XI'
        ]);
        $kelas3 = Kelas::create([
            'nama' => 'XII'
        ]);

        //membuat user admin
        $user1 = User::create([
            'name' => 'Abdul Hadi',
            'username' => 'admin123',
            'email' => 'admin@gmail.com',
            'password' => '123',
        ]);

        $user1->assignRole('admin');

        // membuat user tatus 
        $user2 = User::create([
            'name' => 'Nurul Fadilah',
            'username' => 'tatausaha123',
            'email' => 'tatus@gmail.com',
            'password' => '123',
        ]);

        $user2->assignRole('tata usaha');

        // create user siswa
        $user3 = User::create([
            'name' => 'Ridwan Hanafi',
            'username' => 'nafi123',
            'email' => 'ridwan@gmail.com',
            'password' => '123',
        ]);

        $user3->assignRole('siswa');


        //membuat seed petugas
        $petugas1 = Petugas::create([
            'user_id' => $user1->id,
            'nip' => 10011,
            'nama' => 'Abdul Hadi',
            'jenis_kelamin' => 'Laki-Laki'
        ]);

        $petugas2 = Petugas::create([
            'user_id' => $user2->id,
            'nip' => 10012,
            'nama' => 'Nurul Fadilah',
            'jenis_kelamin' => 'Perempuan'

        ]);


        // membuat seed tagihan
        $tagihan = Tagihan::create([
            'periode' => 2021,
            'jumlah' => 300000
        ]);

        $tagihan = Tagihan::create([
            'periode' => 2022,
            'jumlah' => 400000
        ]);

        $tagihan = Tagihan::create([
            'periode' => 2023,
            'jumlah' => 500000
        ]);


        // membuat seed siswa untuk data siswa
        Siswa::create([
            'jurusan_id' => $jurusan1->id,
            'kelas_id' => $kelas2->id,
            'nis' => '283286',
            'nama' => 'Ridwan Hanafi',
            'email' => 'ridwan@gmail.com',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl Swadaya 2',
            'telepon' => '089526456198'
        ]);

        Siswa::create([
            'jurusan_id' => $jurusan2->id,
            'kelas_id' => $kelas1->id,
            'nis' => '852416',
            'nama' => 'Alfian Fajar',
            'email' => 'alfian@gmail.com',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl Swadaya 3',
            'telepon' => '089526456198'
        ]);
    }
}
