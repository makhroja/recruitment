<?php

use App\Models\Profile;
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
            'uuid' => Str::uuid()->getHex(),
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123'),
            'role' => 'Administrator',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $admin->assignRole('administrator');

        $sdm = User::create([
            'uuid' => Str::uuid()->getHex(),
            'name' => 'SDM',
            'email' => 'sdm@mail.com',
            'password' => bcrypt('123'),
            'role' => 'SDM',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $sdm->assignRole('sdm');

        $ipcn = User::create([
            'uuid' => Str::uuid()->getHex(),
            'name' => 'Okta Setiawati',
            'email' => 'ipcn@mail.com',
            'password' => bcrypt('123'),
            'role' => 'Karu',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $ipcn->assignRole('karu');

        $hd = User::create([
            'uuid' => Str::uuid()->getHex(),
            'name' => 'Handayani Woro Ganjaran',
            'email' => 'hd@mail.com',
            'password' => bcrypt('123'),
            'role' => 'Karu',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $hd->assignRole('karu');

        $sochich = User::create([
            'uuid' => Str::uuid()->getHex(),
            'name' => 'Dian Setiyowati',
            'email' => 'sochich@mail.com',
            'password' => bcrypt('123'),
            'role' => 'Karu',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $sochich->assignRole('karu');

        $it = User::create([
            'uuid' => Str::uuid()->getHex(),
            'name' => 'Markoyo',
            'email' => 'it@mail.com',
            'password' => bcrypt('123'),
            'role' => 'Karu',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $it->assignRole('karu');


        $alfred = User::create([
            'uuid' => Str::uuid()->getHex(),
            'name' => 'Alfred Shane',
            'email' => 'user@mail.com',
            'password' => bcrypt('123'),
            'role' => 'Peserta',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $alfred->assignRole('peserta');

        #6
        $djendra = User::create([
            'uuid' => Str::uuid()->getHex(),
            'name' => 'Djendra Priono',
            'email' => 'djendra@mail.com',
            'password' => bcrypt('123'),
            'role' => 'Peserta',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $djendra->assignRole('peserta');

        #7
        $galih = User::create([
            'uuid' => Str::uuid()->getHex(),
            'name' => 'Galih Fadlil',
            'email' => 'galih@mail.com',
            'password' => bcrypt('123'),
            'role' => 'Peserta',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $galih->assignRole('peserta');

        #8
        $alfian = User::create([
            'uuid' => Str::uuid()->getHex(),
            'name' => 'Alfian Yoshitmitsu',
            'email' => 'alfian@mail.com',
            'password' => bcrypt('123'),
            'role' => 'Peserta',
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        $alfian->assignRole('peserta');
    }
}
