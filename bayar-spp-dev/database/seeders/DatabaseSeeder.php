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
            'nama' => 'TSM 1'
        ]);
        $jurusan2 = Jurusan::create([
            'nama' => 'TSM 2'
        ]);
        $jurusan3 = Jurusan::create([
            'nama' => 'TKR 1'
        ]);
        $jurusan4 = Jurusan::create([
            'nama' => 'TKR 2'
        ]);
        $jurusan5 = Jurusan::create([
            'nama' => 'AK 1'
        ]);
        $jurusan6 = Jurusan::create([
            'nama' => 'AK 2'
        ]);
        $jurusan7 = Jurusan::create([
            'nama' => 'AP 1'
        ]);
        $jurusan8 = Jurusan::create([
            'nama' => 'AP 2'
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

        // create user siswa 1
        $user3 = User::create([
            'name' => 'Ridwan Hanafi',
            'username' => 'nafi123',
            'email' => 'ridwan@gmail.com',
            'password' => '123',
        ]);

        $user3->assignRole('siswa');

        // create user siswa 2
        $user4 = User::create([
            'name' => 'Alfian Fajar',
            'username' => 'alfian123',
            'email' => 'alfian@gmail.com',
            'password' => '123',
        ]);
        $user4->assignRole('siswa');


        // create user siswa 3
        $user5 = User::create([
            'name' => 'Nur Azizah',
            'username' => 'azizah123',
            'email' => 'azizah@gmail.com',
            'password' => '123',
        ]);

        $user5->assignRole('siswa');

        // create user siswa 4
        $user6 = User::create([
            'name' => 'Aisyah Nurul',
            'username' => 'aisyah123',
            'email' => 'aisyah@gmail.com',
            'password' => '123',
        ]);

        $user6->assignRole('siswa');


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

        Siswa::create([
            'jurusan_id' => $jurusan4->id,
            'kelas_id' => $kelas3->id,
            'nis' => '917162',
            'nama' => 'Nur Azizah',
            'email' => 'azizah@gmail.com',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl Swadaya 8',
            'telepon' => '089526456198'
        ]);

        Siswa::create([
            'jurusan_id' => $jurusan6->id,
            'kelas_id' => $kelas3->id,
            'nis' => '227181',
            'nama' => 'Aisyah Nurul',
            'email' => 'aisyah@gmail.com',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl Swadaya 9',
            'telepon' => '089526456198'
        ]);
    }
}
