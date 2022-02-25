<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'Admin Role',
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123')
        ]);

        $admin->assignRole('admin');

        $tatus = User::create([
            'username' => 'TataUsahaRole',
            'name' => 'TataUsaha',
            'email' => 'tatus@gmail.com',
            'password' => bcrypt('123')
        ]);

        $tatus->assignRole('tatus');

        $siswa = User::create([
            'username' => 'SiswaRole',
            'name' => 'Siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('123')
        ]);

        $siswa->assignRole('siswa');
    }
}
