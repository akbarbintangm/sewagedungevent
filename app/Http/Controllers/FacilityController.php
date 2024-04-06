<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function facilityPageAdmin()
    {
        return view("admin.facility.index");
    }

    public function facilityPageOwner()
    {
        return view("owner.facility.index");
    }
}
