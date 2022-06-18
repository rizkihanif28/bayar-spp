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

        // membuat seed kelas
        $kelas1 = Kelas::create([
            'nama_kelas' => 'X TSM 1',
            'jurusan' => 'Teknik Sepeda Motor'
        ]);
        $kelas2 = Kelas::create([
            'nama_kelas' => 'X TSM 2',
            'jurusan' => 'Teknik Sepeda Motor'
        ]);
        $kelas3 = Kelas::create([
            'nama_kelas' => 'X TKR 1',
            'jurusan' => 'Teknik Kendaraan Ringan'
        ]);
        $kelas4 = Kelas::create([
            'nama_kelas' => 'X TKR 2',
            'jurusan' => 'Teknik Kendaraan Ringan'
        ]);
        $kelas5 = Kelas::create([
            'nama_kelas' => 'X AK 1',
            'jurusan' => 'Akutansi'
        ]);
        $kelas6 = Kelas::create([
            'nama_kelas' => 'X AK 2',
            'jurusan' => 'Akutansi'
        ]);
        $kelas7 = Kelas::create([
            'nama_kelas' => 'X AP 1',
            'jurusan' => 'Administrasi Perkantoran'
        ]);
        $kelas8 = Kelas::create([
            'nama_kelas' => 'X AP 2',
            'jurusan' => 'Administrasi Perkantoran'
        ]);

        // batas kelas X
        $kelas9 = Kelas::create([
            'nama_kelas' => 'XI TSM 1',
            'jurusan' => 'Teknik Sepeda Motor'
        ]);
        $kelas10 = Kelas::create([
            'nama_kelas' => 'XI TSM 2',
            'jurusan' => 'Teknik Sepeda Motor'
        ]);
        $kelas11 = Kelas::create([
            'nama_kelas' => 'XI TKR 1',
            'jurusan' => 'Teknik Kendaraan Ringan'
        ]);
        $kelas12 = Kelas::create([
            'nama_kelas' => 'XI TKR 2',
            'jurusan' => 'Teknik Kendaraan Ringan'
        ]);
        $kelas13 = Kelas::create([
            'nama_kelas' => 'XI AK 1',
            'jurusan' => 'Akutansi'
        ]);
        $kelas14 = Kelas::create([
            'nama_kelas' => 'XI AK 2',
            'jurusan' => 'Akutansi'
        ]);
        $kelas15 = Kelas::create([
            'nama_kelas' => 'XI AP 1',
            'jurusan' => 'Adminstrasi Perkantoran'
        ]);
        $kelas16 = Kelas::create([
            'nama_kelas' => 'XI AP 2',
            'jurusan' => 'Administrasi Perkantoran'
        ]);

        //batas kelas XI
        $kelas17 = Kelas::create([
            'nama_kelas' => 'XII TSM 1',
            'jurusan' => 'Teknik Sepeda Motor'
        ]);
        $kelas18 = Kelas::create([
            'nama_kelas' => 'XII TSM 2',
            'jurusan' => 'Teknik Sepeda Motor'
        ]);
        $kelas19 = Kelas::create([
            'nama_kelas' => 'XII TKR 1',
            'jurusan' => 'Teknik Kendaraan Ringan'
        ]);
        $kelas20 = Kelas::create([
            'nama_kelas' => 'XII TKR 2',
            'jurusan' => 'Teknik Kendaraan Ringan'
        ]);
        $kelas21 = Kelas::create([
            'nama_kelas' => 'XII AK 1',
            'jurusan' => 'Akutansi'
        ]);
        $kelas22 = Kelas::create([
            'nama_kelas' => 'XII AK 2',
            'jurusan' => 'Akutansi'
        ]);
        $kelas23 = Kelas::create([
            'nama_kelas' => 'XII AP 1',
            'jurusan' => 'Administrasi Perkantoran'
        ]);
        $kelas24 = Kelas::create([
            'nama_kelas' => 'XII AP 2',
            'jurusan' => 'Administrasi Perkantoran'
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
        $user3 = User::create([
            'name' => 'Alfian Fajar',
            'username' => 'alfian123',
            'email' => 'alfian@gmail.com',
            'password' => '123',
        ]);
        $user3->assignRole('siswa');


        // create user siswa 3
        $user3 = User::create([
            'name' => 'Nur Azizah',
            'username' => 'azizah123',
            'email' => 'azizah@gmail.com',
            'password' => '123',
        ]);

        $user3->assignRole('siswa');

        // create user siswa 4
        $user3 = User::create([
            'name' => 'Aisyah Nurul',
            'username' => 'aisyah123',
            'email' => 'aisyah@gmail.com',
            'password' => '123',
        ]);

        $user3->assignRole('siswa');


        //membuat seed petugas
        $petugas1 = Petugas::create([
            'user_id' => $user1->id,
            'nip' => 10011,
            'nama' => 'Administrator',
            'jenis_kelamin' => 'Laki-Laki'
        ]);

        $petugas2 = Petugas::create([
            'user_id' => $user2->id,
            'nip' => 10012,
            'nama' => 'Tata Usaha',
            'jenis_kelamin' => 'Perempuan'

        ]);


        // membuat seed tagihan
        Tagihan::create([
            'periode' => 2021,
            'nominal' => 300000
        ]);

        Tagihan::create([
            'periode' => 2022,
            'nominal' => 400000
        ]);

        Tagihan::create([
            'periode' => 2023,
            'nominal' => 500000
        ]);


        // membuat seed siswa untuk data siswa
        Siswa::create([
            'user_id' => $user3->id,
            'kelas_id' => $kelas2->id,
            'nis' => '283286',
            'nama_siswa' => 'Ridwan Hanafi',
            'email' => 'ridwan@gmail.com',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl Swadaya 2',
            'telepon' => '089526456198'
        ]);

        Siswa::create([
            'user_id' => $user3->id,
            'kelas_id' => $kelas10->id,
            'nis' => '852416',
            'nama_siswa' => 'Alfian Fajar',
            'email' => 'alfian@gmail.com',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl Swadaya 3',
            'telepon' => '089526456198'
        ]);

        Siswa::create([
            'user_id' => $user3->id,
            'kelas_id' => $kelas13->id,
            'nis' => '917162',
            'nama_siswa' => 'Nur Azizah',
            'email' => 'azizah@gmail.com',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl Swadaya 8',
            'telepon' => '089526456198'
        ]);

        Siswa::create([
            'user_id' => $user3->id,
            'kelas_id' => $kelas23->id,
            'nis' => '227181',
            'nama_siswa' => 'Aisyah Nurul',
            'email' => 'aisyah@gmail.com',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl Swadaya 9',
            'telepon' => '089526456198'
        ]);
    }
}
