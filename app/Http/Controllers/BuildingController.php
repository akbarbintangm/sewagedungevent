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
use DataTables;

class BuildingController extends Controller
{
    public function buildingPageAdmin()
    {
        return view("admin.building.index");
    }

    public function listBuildingAdminVerified(Request $request) {
        if ($request->ajax()) {
            $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'buildings.address', 'buildings.price', 'user_created.name as created_by', 'user_owner.name as owner_name')
                ->where('buildings.status', 1);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    $data['name'] = $row->name;
                    return view('components.admin.building.verified.name', $data);
                })
                ->addColumn('owner_name', function ($row) {
                    $data['owner_name'] = $row->owner_name;
                    return view('components.admin.building.verified.owner_name', $data);
                })
                ->addColumn('address', function ($row) {
                    $data['address'] = $row->address;
                    return view('components.admin.building.verified.address', $data);
                })
                ->addColumn('price', function ($row) {
                    $data['price'] = $row->price;
                    return view('components.admin.building.verified.price', $data);
                })
                ->addColumn('action', function ($row) {
                    $data['id'] = $row->id;
                    return view('components.admin.building.verified.action', $data);
                })
                ->rawColumns(['name', 'owner_name', 'address', 'price', 'action'])
                ->escapeColumns([])
                ->make();
        }
    }

    public function listBuildingAdminUnverified(Request $request) {
        if ($request->ajax()) {
            $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'buildings.address', 'buildings.price', 'buildings.status', 'user_created.name as created_by', 'user_owner.name as owner_name')
                ->where('buildings.status', 0);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    $data['name'] = $row->name;
                    return view('components.admin.building.unverified.name', $data);
                })
                ->addColumn('owner_name', function ($row) {
                    $data['owner_name'] = $row->owner_name;
                    return view('components.admin.building.unverified.owner_name', $data);
                })
                ->addColumn('address', function ($row) {
                    $data['address'] = $row->address;
                    return view('components.admin.building.unverified.address', $data);
                })
                ->addColumn('price', function ($row) {
                    $data['price'] = $row->price;
                    return view('components.admin.building.unverified.price', $data);
                })
                ->addColumn('status', function ($row) {
                    $data['status'] = $row->status;
                    return view('components.admin.building.unverified.status', $data);
                })
                ->addColumn('action', function ($row) {
                    $data['id'] = $row->id;
                    return view('components.admin.building.unverified.action', $data);
                })
                ->rawColumns(['name', 'owner_name', 'address', 'price', 'status', 'action'])
                ->escapeColumns([])
                ->make();
        }
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
                $idOwner = DB::table('users')->insertGetId($roomOwnerData);
            }
        } else if(Auth::user()->type_user == "PEMILIK_GEDUNG") {
            $idOwner = Auth::user()->id;
        }
        $buildingData = [
            'id_owner' => $idOwner,
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
                // disini resize ke 2160 (high res) dan duplicate jadi minified ke 360 (preview)
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
