<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'administrator',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'direktur',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'hrd',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'sdm',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'karu',
            'guard_name' => 'web'
        ]);


        Role::create([
            'name' => 'peserta',
            'guard_name' => 'web'
        ]);
    }
}
