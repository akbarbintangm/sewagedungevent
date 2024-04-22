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

        DB::table('users')->insert([
            'name' => 'Akbar Bintang Mahendra',
            'email' => 'akbarbintangmahendra@gmail.com',
            'phone' => '',
            'type_user' => 'PEMILIK_GEDUNG',
            'profile' => 'akbar.jpg',
            'password' => Hash::make('akbar'),
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Hendra',
            'email' => 'hendra@gmail.com',
            'phone' => '',
            'type_user' => 'CUSTOMER',
            'profile' => 'hendra.jpg',
            'password' => Hash::make('hendra'),
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $data = [];

        $names = ['Hendra', 'Budi', 'Siti', 'Joko', 'Lina', 'Rina', 'Adi', 'Dewi', 'Agus', 'Eka', 'Rudi', 'Citra', 'Dian', 'Putri', 'Ani', 'Arif', 'Rita', 'Andi', 'Sinta', 'Yudi', 'Nita', 'Dina', 'Dini', 'Fajar', 'Indra', 'Rani', 'Wati', 'Tono', 'Wawan', 'Doni']; // Daftar nama yang akan diacak dengan banyak variasi
        $profiles = ['hendra.jpg', 'budi.jpg', 'siti.jpg', 'joko.jpg', 'lina.jpg', 'rina.jpg', 'adi.jpg', 'dewi.jpg', 'agus.jpg', 'eka.jpg', 'rudi.jpg', 'citra.jpg', 'dian.jpg', 'putri.jpg', 'ani.jpg', 'arif.jpg', 'rita.jpg', 'andi.jpg', 'sinta.jpg', 'yudi.jpg', 'nita.jpg', 'dina.jpg', 'dini.jpg', 'fajar.jpg', 'indra.jpg', 'rani.jpg', 'wati.jpg', 'tono.jpg', 'wawan.jpg', 'doni.jpg']; // Daftar profil yang akan diacak dengan banyak variasi

        for ($i = 0; $i < 50; $i++) {
            $name = $this->shuffleAndConsistent($names[array_rand($names)]);
            $email = strtolower($name) . $i . '@gmail.com';
            $password = Hash::make($name);
            $profile = $profiles[array_rand($profiles)];
            $type_user = rand(0, 1) ? 'CUSTOMER' : 'PEMILIK_GEDUNG';

            $data[] = [
                'name' => $name,
                'email' => $email,
                'phone' => '',
                'type_user' => $type_user,
                'profile' => $profile,
                'password' => $password,
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('users')->insert($data);
    }

    function shuffleAndConsistent($string)
    {
        $shuffled = str_shuffle($string);
        return ucfirst(strtolower($shuffled));
    }
}
