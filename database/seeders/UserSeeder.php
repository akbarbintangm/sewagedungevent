<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'administrator@gmail.com',
            'phone' => '',
            'type_user' => 'ADMINISTRATOR',
            'profile' => 'admin.jpg',
            'password' => Hash::make('administrator'),
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Asple',
            'email' => 'asple@gmail.com',
            'phone' => '',
            'type_user' => 'PEMILIK_GEDUNG',
            'profile' => 'asple.jpg',
            'password' => Hash::make('asple'),
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Aji',
            'email' => 'aji@gmail.com',
            'phone' => '',
            'type_user' => 'CUSTOMER',
            'profile' => 'aji.jpg',
            'password' => Hash::make('aji'),
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
