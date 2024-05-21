<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $adminId = 1;
        $currentDate = now()->format('Ymd');

        for ($i = 0; $i < 10000; $i++) {
            $idCustomer = $faker->numberBetween(1, 200);
            $idBuilding = $faker->numberBetween(1, 1000);
            $dateStart = $faker->dateTimeBetween('2024-01-01', 'now')->format('Y-m-d');
            $totalPay = $faker->numberBetween(100000, 10000000);
            $statusOrder = $faker->numberBetween(0, 3);
            $statusTransaction = ($statusOrder == 3) ? $faker->numberBetween(1, 2) : 0;
            $code = 'TRX/' . str_replace('-', '', $dateStart) . '/' . ($i + 1) . '/' . strtoupper($faker->lexify('????')) . '/' . $currentDate;

            DB::table('transactions')->insert([
                'id_admin' => $adminId,
                'id_customer' => $idCustomer,
                'id_building' => $idBuilding,
                'total_day' => 1,
                'date_start' => $dateStart,
                'date_end' => null,
                'transfer_image' => $faker->lexify('????????????????.jpg'),
                'total_pay' => $totalPay,
                'status_order' => $statusOrder,
                'status_transaction' => $statusTransaction,
                'code' => $code,
                'created_by' => $adminId,
                'updated_by' => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
