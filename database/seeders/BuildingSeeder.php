<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'id_owner' => rand(2, 4),
                'name' => $this->generateRandomString(),
                'price' => rand(100000, 10000000),
                'address' => $this->generateRandomString(20),
                'description' => $this->generateRandomString(50),
                'facilities' => 'Fasilitas Gedung ' . ($i + 1) . ',Fasilitas Gedung ' . ($i + 2),
                'picture_1' => 'room_1.png',
                'picture_2' => 'room_2.png',
                'picture_3' => 'room_3.png',
                'picture_4' => 'room_4.png',
                'picture_5' => 'room_5.png',
                'picture_6' => 'room_6.png',
                'picture_7' => 'room_7.png',
                'picture_8' => 'room_8.png',
                'picture_9' => 'room_9.png',
                'picture_10' => 'room_10.png',
                'status' => rand(0, 1, 2),
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('buildings')->insert($data);
    }

    /**
     * Generate a random string.
     *
     * @param  int  $length
     * @return string
     */
    protected function generateRandomString($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}
