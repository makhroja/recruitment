<?php

use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserDetail::create([
            'uuid' => Str::uuid()->getHex(),
            'user_id' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        UserDetail::create([
            'uuid' => Str::uuid()->getHex(),
            'user_id' => 2,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        UserDetail::create([
            'uuid' => Str::uuid()->getHex(),
            'user_id' => 3,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        UserDetail::create([
            'uuid' => Str::uuid()->getHex(),
            'user_id' => 4,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        UserDetail::create([
            'uuid' => Str::uuid()->getHex(),
            'user_id' => 5,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        UserDetail::create([
            'uuid' => Str::uuid()->getHex(),
            'user_id' => 6,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        UserDetail::create([
            'uuid' => Str::uuid()->getHex(),
            'user_id' => 7,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        UserDetail::create([
            'uuid' => Str::uuid()->getHex(),
            'user_id' => 8,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        UserDetail::create([
            'uuid' => Str::uuid()->getHex(),
            'user_id' => 9,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
    }
}
