<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profilePageAdmin() {
        return view("admin.profile.index");
    }

    public function profilePageOwner() {
        return view("owner.profile.index");
    }

    public function userPageAdmin() {
        return view("admin.users.index");
    }

    public function userPageOwner() {
        return view("owner.users.index");
    }

    public function profilePageUser() {
        return view("user.account");
    }
}
