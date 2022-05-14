<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'name'	=> 'Admin',
            'email'	=> 'admin@gmail.com',
            'role'=> 'admin',
            'password'	=> Hash::make('admin123')
        ]);

        Users::create([
            'name'	=> 'Didi As Pelamar',
            'email'	=> 'didiaspelamar@gmail.com',
            'role'=> 'user',
            'password'	=> Hash::make('pelamar123')
        ]);

        Jabatan::create([
            'jabatan'	=> 'Senior Programmer',
        ]);

        Jabatan::create([
            'jabatan'	=> 'Junior Programmer',
        ]);

        Jabatan::create([
            'jabatan'	=> 'HRD',
        ]);
    }
}
