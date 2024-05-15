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
    public function buildingPage() {
        if(Auth::user()->type_user === 'ADMINISTRATOR') {
            return view("pages.admin.building.index");
        } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
            return view("pages.admin-entry.building.index");
        } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
            return view("pages.owner.building.index");
        } else {
            return redirect()->back()->with('error', 'Anda tidak diijinkan!');
        }
    }

    public function listBuildingVerified(Request $request) {
        if ($request->ajax()) {
            if(Auth::user()->type_user === 'ADMINISTRATOR') {
                $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'buildings.address', 'buildings.price', 'user_created.name as created_by', 'user_owner.name as owner_name')
                ->where('buildings.status', 1);
            } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
                $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'buildings.address', 'buildings.price', 'user_created.name as created_by', 'user_owner.name as owner_name')
                ->where('buildings.status', 1);
            } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
                $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'buildings.address', 'buildings.price', 'user_created.name as created_by', 'user_owner.name as owner_name')
                ->where('buildings.status', 1)
                ->where('buildings.id_owner', Auth::user()->id);
            } else {
                $data = [];
            }
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
                    $data['status'] = $row->status;
                    return view('components.admin.building.verified.action', $data);
                })
                ->rawColumns(['name', 'owner_name', 'address', 'price', 'action'])
                ->escapeColumns([])
                ->make();
        }
    }

    public function listBuildingUnverified(Request $request) {
        if ($request->ajax()) {
            if(Auth::user()->type_user === 'ADMINISTRATOR') {
                $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'buildings.address', 'buildings.price', 'buildings.status', 'user_created.name as created_by', 'user_owner.name as owner_name')
                ->where('buildings.status', 0);
            } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
                $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'buildings.address', 'buildings.price', 'buildings.status', 'user_created.name as created_by', 'user_owner.name as owner_name')
                ->where('buildings.status', 0);
            } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
                $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'buildings.address', 'buildings.price', 'buildings.status', 'user_created.name as created_by', 'user_owner.name as owner_name')
                ->where('buildings.status', 0)
                ->where('buildings.id_owner', Auth::user()->id);
            } else {
                $data = [];
            }
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
                    $data['status'] = $row->status;
                    return view('components.admin.building.unverified.action', $data);
                })
                ->rawColumns(['name', 'owner_name', 'address', 'price', 'status', 'action'])
                ->escapeColumns([])
                ->make();
        }
    }

    public function detailPageBuilding($id) {
        $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
                ->where('buildings.id', $id)
                ->first();
        if(Auth::user()->type_user === 'ADMINISTRATOR') {
            return view("pages.admin.building.detail", compact('data'));
        } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
            return view("pages.admin-entry.building.detail", compact('data'));
        } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
            return view("pages.owner.building.detail", compact('data'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak diijinkan!');
        }
    }

    public function updateBuilding(Request $request, $id) {
        $roomDataRequest = $request->validate([
            'room_name' => 'required',
            'room_price' => 'required',
            'room_address' => 'required',
            'room_description' => 'required',
            'room_facilities' => 'required',
            'room_image' => 'required'
        ]);
        $getOwnerAndBuildingData = DB::table('buildings')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'user_owner.name as owner_name', 'user_owner.email as owner_email', 'user_owner.id as owner_id')
                ->where('buildings.id', $id)
                ->first();
        $buildingData = [
            'name' => $roomDataRequest['room_name'],
            'price' => $roomDataRequest['room_price'],
            'address' => $roomDataRequest['room_address'],
            'description' => $roomDataRequest['room_description'],
            'facilities' => $roomDataRequest['room_facilities'],
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ];
        $buildingId = DB::table('buildings')->where('id', $id)->update($buildingData);
        $this->createFolder('/rooms/' . $getOwnerAndBuildingData->owner_email);
        $this->deleteFolder('/rooms/' . $getOwnerAndBuildingData->owner_email . '/' . $getOwnerAndBuildingData->name);
        $this->createFolder('/rooms/' . $getOwnerAndBuildingData->owner_email . '/' . $roomDataRequest['room_name']);
        for ($i = 0; $i < count($request->file('room_image')); $i++) {
            if ($request->hasFile('room_image.' . $i)) {
                $image = $request->file('room_image.' . $i);
                $imageName = 'room_' . $i+1 . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/rooms/' . $getOwnerAndBuildingData->owner_email . '/' . $roomDataRequest['room_name']), $imageName);
                // disini resize ke 2160 (high res) dan duplicate jadi minified ke 360 (preview)
                DB::table('buildings')->where('id', $id)->update(['picture_' . $i+1 => $imageName]);
            }
        }
        return redirect()->route('buildingPage:admin')->with('success', 'Ruangan ' . $roomDataRequest['room_name'] . ' berhasil diedit.');
        // update versi ke 2, todo Try Catch, dan tambahkan Response JSON, bukan redirect halaman lagi
    }

    public function verifyBuilding(Request $request, $id) {
        $verifyData = [
            'status' => 1,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ];
        try {
            $buildingId = DB::table('buildings')->where('buildings.id', $id)->update($verifyData);
            $getData = DB::table('buildings')->where('buildings.id', $id)->select('buildings.*')->first();
            return $this->arrayResponse(200, 'success', 'Ruangan ' . $getData->name . ' berhasil di verifikasi.', null);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function deleteBuilding(Request $request, $id) {
        $getOwnerAndBuildingData = DB::table('buildings')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.id', 'buildings.name', 'user_owner.name as owner_name', 'user_owner.email as owner_email', 'user_owner.id as owner_id')
                ->where('buildings.id', $id)
                ->first();
        $dataRoomName = $getOwnerAndBuildingData->name;
        $this->deleteFolder('/rooms/' . $getOwnerAndBuildingData->owner_email . '/' . $getOwnerAndBuildingData->name);
        try {
            $buildingId = DB::table('buildings')->where('buildings.id', $id)->delete();
            return $this->arrayResponse(200, 'success', 'Ruangan ' . $dataRoomName . ' berhasil di hapus.', null);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function addPageBuilding() {
        if(Auth::user()->type_user === 'ADMINISTRATOR') {
            return view("pages.admin.building.add");
        } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
            return view("pages.admin-entry.building.add");
        } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
            return view("pages.owner.building.add");
        } else {
            return redirect()->back()->with('error', 'Anda tidak diijinkan!');
        }
    }

    public function addBuilding(Request $request) {
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
        if (Auth::user()->type_user == "ADMINISTRATOR" || Auth::user()->type_user == "ADMIN_ENTRY") {
            $roomOwnerData = [
                'name' => Str::title($roomDataRequest['owner_name']),
                'email' => $roomDataRequest['owner_email'],
                'type_user' => 'PEMILIK_GEDUNG',
                'password' => Hash::make(Str::lower(str_replace(' ', '', $roomDataRequest['owner_name']))),
                'status' => 1,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $checkDataOwner = DB::table('users')->where('email', $roomOwnerData['email'])->orWhere('name', $roomOwnerData['name'])->first();
            if (!$checkDataOwner) {
                $idOwner = DB::table('users')->insertGetId($roomOwnerData);
            } else {
                $idOwner = Auth::user()->id;
                // Beri catch jika ada kesalahan seperti administrator / admin entry yang ngemasukin datanya
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
        // update versi ke 2, todo Try Catch, dan tambahkan Response JSON, bukan redirect halaman lagi
    }

    public function createFolder($fullPath) {
        $path = public_path($fullPath);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            return true;
        } else {
            return false;
        }
    }

    public function deleteFolder($fullPath) {
        $path = public_path($fullPath);
        if (is_dir($path)) {
            $files = array_diff(scandir($path), array('.', '..'));
            foreach ($files as $file) {
                (is_dir("$path/$file")) ? deleteFolder("$path/$file") : unlink("$path/$file");
            }
            return rmdir($path);
        } else {
            return false;
        }
    }

    public function arrayResponse($status, $message, $detailMessage, $data) {
        $response = ['status' => $status, 'message' => $message, 'detail_message' => $detailMessage, 'data' => $data];
        return response()->json($response);
    }
}
