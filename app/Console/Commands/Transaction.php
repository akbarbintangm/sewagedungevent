<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Transaction extends Command
{
    protected $signature = 'transaction';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $dateToday = date('Y-m-d');
        $updateStatusTransaction = DB::table('transactions')
            ->where('status_order', 3)
            ->where('status_transaction', 1)
            ->where('date_start', $dateToday)
            ->update(['status_transaction' => 2]);
        $this->info('Transactions updated successfully.');
    }
}
