<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function orderPageAdmin()
    {
        return view("admin.order.index");
    }

    public function orderPageOwner()
    {
        return view("owner.order.index");
    }

    public function transactionPageAdmin()
    {
        return view("admin.transaction.index");
    }

    public function transactionPageOwner()
    {
        return view("owner.transaction.index");
    }
}
