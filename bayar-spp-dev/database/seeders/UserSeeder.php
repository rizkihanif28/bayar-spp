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
            'name' => 'Abdul Hadi',
            'username' => 'admin123',
            'email' => 'admin@gmail.com',
            'password' => '123',
        ]);

        $admin->assignRole('admin');

        // $tatus1 = User::create([
        //     'name' => 'Nurul Fadilah',
        //     'username' => 'tatausaha123',
        //     'email' => 'tatus@gmail.com',
        //     'password' => '123',
        // ]);

        // $tatus1->assignRole('tata usaha');

    }
}
