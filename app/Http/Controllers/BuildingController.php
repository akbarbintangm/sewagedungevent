<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function buildingPageAdmin()
    {
        return view("admin.building.index");
    }

    public function buildingPageOwner()
    {
        return view("owner.building.index");
    }
}
