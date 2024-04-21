<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image as Image;

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

    public function detailPageBuildingAdmin($id)
    {
        return view("admin.building.detail");
    }

    public function detailPageBuildingOwner($id)
    {
        return view("owner.building.detail");
    }

    public function addPageBuildingAdmin()
    {
        return view("admin.building.add");
    }

    public function addBuildingAdmin(Request $request) {
        $roomDataRequest = $request->validate([
            'owner_name' => 'required',
            'owner_email' => 'required',
            'room_name' => 'required',
            'room_price' => 'required',
            'room_address' => 'required',
            'room_description' => 'required',
            'room_facilities' => 'required',
            'room_image' => 'required'
        ]);
        if (Auth::user()->type_user == "ADMINISTRATOR") {
            $roomOwnerData = [
                'name' => $roomDataRequest['owner_name'],
                'email' => $roomDataRequest['owner_email'],
                'type_user' => 'PEMILIK_GEDUNG',
                'password' => Hash::make('roomowner'),
                'status' => 1,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $checkDataOwner = DB::table('users')->where('email', $roomOwnerData['email'])->orWhere('name', $roomOwnerData['name'])->first();
            if (!$checkDataOwner) {
                DB::table('users')->insert($roomOwnerData);
            }
        }
        $buildingData = [
            'name' => $roomDataRequest['room_name'],
            'price' => $roomDataRequest['room_price'],
            'address' => $roomDataRequest['room_address'],
            'description' => $roomDataRequest['room_description'],
            'facilities' => $roomDataRequest['room_facilities'],
            'status' => 0,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $buildingId = DB::table('buildings')->insertGetId($buildingData);
        $this->createFolder('/rooms');
        $this->createFolder('/rooms/' . $roomDataRequest['owner_email']);
        $this->createFolder('/rooms/' . $roomDataRequest['owner_email'] . '/' . $roomDataRequest['room_name']);
        for ($i = 0; $i < count($request->file('room_image')); $i++) {
            if ($request->hasFile('room_image.' . $i)) {
                $image = $request->file('room_image.' . $i);
                $imageName = 'room_' . $i+1 . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/rooms/' . $roomDataRequest['owner_email'] . '/' . $roomDataRequest['room_name']), $imageName);
                DB::table('buildings')->where('id', $buildingId)->update(['picture_' . $i+1 => $imageName]);
            }
        }
        return redirect()->route('buildingPage:admin')->with('success', 'Ruangan ' . $roomDataRequest['room_name'] . ' berhasil disimpan.');
    }

    public function addPageBuildingOwner()
    {
        return view("owner.building.add");
    }

    public function createFolder($fullPath)
    {
        $path = public_path($fullPath);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            return true;
        } else {
            return false;
        }
    }
}
