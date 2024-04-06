<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function indexWithoutLoginPageUser()
    {
        return view("home");
    }

    public function dashboardPageAdmin()
    {
        return view("admin.dashboard");
    }

    public function dashboardPageOwner()
    {
        return view("owner.dashboard");
    }
}
